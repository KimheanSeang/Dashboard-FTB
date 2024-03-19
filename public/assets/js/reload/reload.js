function navigateTo(url) {
    var currentUrl = window.location.href;

    if (currentUrl !== url) {
        // Create a loading overlay
        var overlay = document.createElement('div');
        overlay.className = 'loading-overlay';
        overlay.style.width = '100%';
        overlay.style.height = '100%';
        overlay.style.position = 'fixed';
        overlay.style.top = '0';
        overlay.style.left = '0';
        overlay.style.display = 'flex';
        overlay.style.justifyContent = 'center';
        overlay.style.alignItems = 'center';
        overlay.style.zIndex = '999';
        overlay.style.backgroundColor = 'rgba(255, 255, 255, 0.5)';
        overlay.style.backdropFilter = 'blur(0px)'; // Blur effect
        overlay.style.webkitBackdropFilter = 'blur(5px)'; // For Safari

        // Create spinner element
        var spinner = document.createElement('div');
        spinner.className = 'spinner';
        spinner.style.width = '80px';
        spinner.style.height = '80px';
        spinner.style.border = '5px solid transparent';
        spinner.style.borderTopColor = '#ffd700'; // Gold color
        spinner.style.borderRadius = '50%';
        spinner.style.animation = 'spin 0.8s linear infinite';

        // Append spinner to overlay
        overlay.appendChild(spinner);

        // Append overlay to the body
        document.body.appendChild(overlay);

        // Perform the redirection after a short delay
        setTimeout(function () {
            window.location.href = url;
        }, 500);
    } else {
        // Create a loading overlay for the reload
        var overlay = document.createElement('div');
        overlay.className = 'loading-overlay';
        overlay.style.width = '100%';
        overlay.style.height = '100%';
        overlay.style.position = 'fixed';
        overlay.style.top = '0';
        overlay.style.left = '0';
        overlay.style.display = 'flex';
        overlay.style.justifyContent = 'center';
        overlay.style.alignItems = 'center';
        overlay.style.zIndex = '999';
        overlay.style.backgroundColor = 'rgba(255, 255, 255, 0.5)';
        overlay.style.backdropFilter = 'blur(0px)'; // Blur effect
        overlay.style.webkitBackdropFilter = 'blur(5px)'; // For Safari

        // Create spinner element
        var spinner = document.createElement('div');
        spinner.className = 'spinner';
        spinner.style.width = '80px';
        spinner.style.height = '80px';
        spinner.style.border = '5px solid transparent';
        spinner.style.borderTopColor = '#ffd700'; // Gold color
        spinner.style.borderRadius = '50%';
        spinner.style.animation = 'spin 0.8s linear infinite';

        // Append spinner to overlay
        overlay.appendChild(spinner);

        // Append overlay to the body
        document.body.appendChild(overlay);

        // Perform the redirection after a short delay
        setTimeout(function () {
            window.location.href = url;
        }, 500);
    }
}



