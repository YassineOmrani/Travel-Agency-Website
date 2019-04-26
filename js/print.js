var prtContent = document.getElementById("printablePart");
var prtContent2 = document.getElementById("printablePart2");
var printBtn   = document.getElementById("printBtn"); 
var myStyle = '<link href="../css/bootstrap.min.css" rel="stylesheet">';
var myStyle1 = '<link href="../css/bootstrap.css" rel="stylesheet">';
var myStyle2 = '<link rel="stylesheet" type="text/css" media="print" href="../css/printStyle.css">';

printBtn.addEventListener('click', (e) => {
    var WinPrint = window.open('', 'PRINT', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
    WinPrint.document.write(myStyle);
    WinPrint.document.write(myStyle1);
    WinPrint.document.write(myStyle2);
    WinPrint.document.write(prtContent2.innerHTML);
    WinPrint.document.write(prtContent.innerHTML);
    WinPrint.document.close();
    WinPrint.focus();
    WinPrint.print();
    WinPrint.close();
});
