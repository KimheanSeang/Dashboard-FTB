@extends('admin.read')
@section('admin')
    <main>
        <div class="container2">
            <div class="item">
                <input class="file" type="file" id="fileInput" />
                <input class="search" type="text" id="searchKeyNumberInput"
                    placeholder="Search REF_No/TRXENG_No/Card Number" />
                <button onclick="processFile()">Show</button>
                <!-- <button onclick="searchKeyword()">Show Detail</button> -->
                <br />
            </div>
            <!-- <button onclick="processFile()">Show </button> -->
            <div id="output"></div>

            <script>
                function processFile() {
                    const searchKeyNumberInput = document.getElementById('searchKeyNumberInput');
                    const fileInput = document.getElementById('fileInput');
                    const outputDiv = document.getElementById('output');
                    outputDiv.innerHTML = ''; // Clear previous output

                    const file = fileInput.files[0];
                    const searchKeyNumber = searchKeyNumberInput.value.trim();

                    if (file) {
                        const reader = new FileReader();

                        reader.onload = function(e) {
                            const fileContent = e.target.result;
                            const entries = fileContent.split('\n');

                            let found = false;
                            let result = '';

                            // Search for RETR_REF_NO
                            entries.forEach(entry => {
                                if (entry.includes(`RETR_REF_NO :${searchKeyNumber}`)) {
                                    found = true;
                                    result += entry + '\n';
                                }
                            });

                            // If not found, search for DE11
                            if (!found) {
                                let startIndex = -1;
                                let endIndex = -1;

                                for (let i = 0; i < entries.length; i++) {
                                    if (entries[i].includes(`<DE11>${searchKeyNumber}</DE11>`)) {
                                        startIndex = i;
                                        break;
                                    }
                                }

                                if (startIndex !== -1) {
                                    // Go up until finding 'xml version="1.0" encoding="UTF-8"'
                                    for (let i = startIndex; i >= 0; i--) {
                                        if (entries[i].includes('xml version="1.0" encoding="UTF-8"')) {
                                            startIndex = i;
                                            break;
                                        }
                                    }

                                    // Go down until finding '[MASKED]'
                                    endIndex = entries.length; // Go down until the end by default
                                    for (let i = startIndex; i < entries.length; i++) {
                                        if (entries[i].includes('[MASKED]')) {
                                            endIndex = i + 1;
                                            break;
                                        }
                                    }

                                    for (let j = startIndex; j < endIndex; j++) {
                                        result += entries[j] + '\n';
                                    }
                                }
                            }

                            // If still not found, search for DE2
                            if (!found) {
                                let startIndex = -1;
                                let endIndex = -1;

                                for (let i = 0; i < entries.length; i++) {
                                    if (entries[i].includes(`<DE2>${searchKeyNumber}</DE2>`)) {
                                        startIndex = i;
                                        break;
                                    }
                                }

                                if (startIndex !== -1) {
                                    // Go up until finding 'xml version="1.0" encoding="UTF-8"'
                                    for (let i = startIndex; i >= 0; i--) {
                                        if (entries[i].includes('xml version="1.0" encoding="UTF-8"')) {
                                            startIndex = i;
                                            break;
                                        }
                                    }

                                    // Go down until finding '[MASKED]'
                                    endIndex = entries.length; // Go down until the end by default
                                    for (let i = startIndex; i < entries.length; i++) {
                                        if (entries[i].includes('[MASKED]')) {
                                            endIndex = i + 1;
                                            break;
                                        }
                                    }

                                    for (let j = startIndex; j < endIndex; j++) {
                                        result += entries[j] + '\n';
                                    }
                                }
                            }

                            // Display the result
                            if (result.trim() !== '') {
                                // outputDiv.innerText = result;
                                outputDiv.innerText = result +
                                    " \n*Key Number is in # Key Number # :\n*Please Re-Enter <Key Number> And click --> Show Detail  To Show Detail of the transaction:\n\n";

                                outputDiv.innerHTML += '<button onclick="searchKeyword()">Show Detail</button>';
                            } else {
                                outputDiv.innerText = "No log entry found for the specified search criteria.";
                            }
                        };

                        reader.readAsText(file);
                    } else {
                        alert("Please choose a file.");
                    }
                }



                function searchKeyword() {
                    const searchKeyNumberInput = document.getElementById('searchKeyNumberInput');
                    const fileInput = document.getElementById('fileInput');
                    const outputDiv = document.getElementById('output');
                    outputDiv.innerHTML = ''; // Clear previous output

                    const file = fileInput.files[0];
                    const searchKeyNumber = searchKeyNumberInput.value.trim();

                    if (file) {
                        const reader = new FileReader();

                        reader.onload = function(e) {
                            const fileContent = e.target.result;

                            // Extract lines and filter by searchKeyNumber and specific pattern
                            const lines = fileContent.split(/\r?\n/);
                            let capturingXml = false;
                            const matchingLines = [];
                            const xmlLines = [];

                            for (let i = 0; i < lines.length; i++) {
                                const line = lines[i];

                                // Replace the condition to check for the specific keyword
                                if (line.includes(`INFO  # ${searchKeyNumber} # SETTING ERROR RESPONSE CODE`)) {
                                    capturingXml = true;

                                    // Go up 20 lines and start capturing
                                    const startIndex = Math.max(0, i - 18);
                                    for (let j = startIndex; j < i; j++) {
                                        if (
                                            !lines[j].includes('RESPONSE CODE FROM ARQC VERIFY REPLY') &&
                                            !lines[j].includes('------------------------------------') &&
                                            !lines[j].includes('CLOSING SOCKET') &&
                                            !lines[j].includes(
                                                'CLOSE THE SOCKET TO CASTOR ######################### ............'
                                            ) &&
                                            !lines[j].includes('CONNETING AGAIN') &&
                                            !lines[j].includes('FAILURE IN SENDING MESSAGE!!!!') &&
                                            !lines[j].includes('----------------------------') &&
                                            !lines[j].includes('NtwkProfileHandler::getBackupRouteProfile') &&

                                            lines[j].trim() !== ''
                                        ) {
                                            matchingLines.push(lines[j]);
                                        }
                                    }
                                } else if (capturingXml) {
                                    // Check for the end pattern
                                    if (line.includes('')) {
                                        capturingXml = false;
                                        break;
                                    }
                                }
                            }

                            // Display the result for general information
                            if (matchingLines.length > 0) {
                                outputDiv.innerText = "*Here is Detail of that TRX :\n\n" + matchingLines.join(
                                    '\n');
                            } else {
                                outputDiv.innerText = "*Don't have error in ARQC Verify.";
                            }

                            // Extract lines and filter by searchKeyNumber and specific pattern for errors
                            const errorLines = lines.filter(line => {
                                return (
                                    (line.includes(`ERROR # ${searchKeyNumber} #`) && line.includes(
                                        'failed')) ||
                                    (line.includes(`ERROR # ${searchKeyNumber} #`) && line.toUpperCase()
                                        .includes('FAILED') && line.includes('CONNECT')) ||
                                    (line.includes(`# ${searchKeyNumber} #`) && line.toUpperCase()
                                        .includes('INFO') && line.includes(
                                            'SETTING ERROR RESPONSE CODE'))
                                );
                            });

                            // Display the result for errors
                            if (errorLines.length > 0) {
                                outputDiv.innerText += "\n\n*Here is Error of that TRX :'" + searchKeyNumber +
                                    "':\n \n" + errorLines.join('\n');
                            } else {
                                outputDiv.innerText += "\n\n*No Error Found for that TRX'" + searchKeyNumber + "'.";
                            }


                            capturingXml = false;
                            let xmlStartIndex = -1;

                            for (let i = 0; i < lines.length; i++) {
                                const line = lines[i];

                                // Replace the condition to check for the specific keyword
                                if (line.includes(`INFO  # ${searchKeyNumber} # COMPLETE MSG [MASKED] :`)) {
                                    capturingXml = true;

                                    xmlStartIndex = i;
                                    while (xmlStartIndex >= 0 && !lines[xmlStartIndex].includes(
                                            'xml version="1.0" encoding="UTF-8"')) {
                                        xmlStartIndex--; // Move up one line
                                    }

                                    // Start capturing
                                    const startIndex = Math.max(0, xmlStartIndex - 0);
                                    for (let j = startIndex; j < i; j++) {
                                        if (!lines[j].includes('----POS PURCHASE TRXN VALIDATION END') &&
                                            !lines[j].includes('Reply to router')) {
                                            xmlLines.push(lines[j]);
                                        }
                                    }

                                    // Break out of the loop after capturing the XML
                                    break;
                                }
                            }
                            for (let i = 0; i < lines.length; i++) {
                                const line = lines[i];

                                // Replace the condition to check for the specific keyword
                                if (line.includes(`INFO  # ${searchKeyNumber} # READ MSG [MASKED] :`)) {
                                    capturingXml = true;

                                    xmlStartIndex = i;
                                    while (xmlStartIndex >= 0 && !lines[xmlStartIndex].includes(
                                            'xml version="1.0" encoding="UTF-8"')) {
                                        xmlStartIndex--; // Move up one line
                                    }

                                    // Start capturing
                                    const startIndex = Math.max(0, xmlStartIndex - 0);
                                    for (let j = startIndex; j < i; j++) {
                                        if (!lines[j].includes('----POS PURCHASE TRXN VALIDATION END') &&
                                            !lines[j].includes('Reply to router')) {
                                            xmlLines.push(lines[j]);
                                        }
                                    }

                                    // Break out of the loop after capturing the XML
                                    break;
                                }
                            }

                            // Display the result for XML
                            if (xmlLines.length > 0) {
                                outputDiv.innerText += "\n\n*Here is XML Detail of that TRX :\n\n" + xmlLines.join(
                                    '\n');
                            } else {
                                outputDiv.innerText += "\n\n*No XML Found for that TRX'.";
                            }
                        };



                        reader.readAsText(file);
                    } else {
                        alert("Please choose a file.");
                    }
                }
            </script>

        </div>
    </main>
@endsection
