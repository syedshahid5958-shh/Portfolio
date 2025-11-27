// 1. Cursor Tracking
const cursor = document.querySelector('.cursor');
document.addEventListener('mousemove', (e) => {
    cursor.style.left = e.pageX + 'px';
    cursor.style.top = e.pageY + 'px';
});

// 2. USN Validation (Regex)
function validateForm() {
    let usn = document.getElementById('usn').value;
    // Regex: 1AA20CS001
    let usnRegex = /^[1-4][A-Z]{2}\d{2}[A-Z]{2}\d{3}$/;

    if (!usnRegex.test(usn)) {
        alert("Invalid USN! Format example: 1AA20CS001");
        return false; // Stop PHP submission
    }
    return true; // Allow PHP submission
}

// 3. XML + XSLT Loader
function loadXML() {
    const xhr = new XMLHttpRequest();
    xhr.open("GET", "data.xml", true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            const xml = xhr.responseXML;
            const xslXhr = new XMLHttpRequest();
            xslXhr.open("GET", "style.xsl", true);
            xslXhr.onreadystatechange = function() {
                if (xslXhr.readyState == 4 && xslXhr.status == 200) {
                    const xsl = xslXhr.responseXML;
                    const xsltProcessor = new XSLTProcessor();
                    xsltProcessor.importStylesheet(xsl);
                    const resultDocument = xsltProcessor.transformToFragment(xml, document);
                    document.getElementById("xml-display").innerHTML = "";
                    document.getElementById("xml-display").appendChild(resultDocument);
                }
            };
            xslXhr.send();
        }
    };
    xhr.send();
}