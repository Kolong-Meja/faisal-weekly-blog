const buttonRefresh = document.getElementById("buttonRefresh");
const currentUrl = window.location.href;
const urlObj = new URL(currentUrl);

buttonRefresh.addEventListener("click", function() {
    urlObj.search = '';
    urlObj.hash = '';
    const freshUrl = urlObj.toString();
    window.location.href = freshUrl;
});



