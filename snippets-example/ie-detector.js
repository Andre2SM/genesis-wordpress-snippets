// IE Detector 
// wp_enqueue_script( 'ie-detector', get_stylesheet_directory_uri() .'/assets/js/ie-detector.js', array(), CHILD_THEME_VERSION, true );

function isIE() {
    return window.navigator.userAgent.match(/(MSIE|Trident)/);
}

function messageIE() {
    const siteContainer = document.querySelector( '.site-container' );
    const siteHeader = document.querySelector( '.site-header' );

    const messageContainer = document.createElement("div");

    messageContainer.innerHTML = 'For a better user experience please open the website with the following browsers: <a href="https://www.google.com/chrome/" target="_blank" rel="nofollow noopener">Google Chrome</a>, <a href="https://www.mozilla.org/en-US/firefox/new/" target="_blank" rel="nofollow noopener">Firefox</a> or <a href="https://support.apple.com/downloads/safari" target="_blank" rel="nofollow noopener">Safari</a>.';

    messageContainer.classList.add( 'warning-message-ie' );
    messageContainer.style.margin = '0 -15px';
    messageContainer.style.backgroundColor = '#f1e5bc';
    messageContainer.style.textAlign = 'center';
    messageContainer.style.padding = '5px 0';


    siteContainer.insertBefore( messageContainer, siteHeader );
}

//function to show alert if it's IE
function showMessageIE(){
    if(isIE()){
        messageIE();
    } 
}

showMessageIE();