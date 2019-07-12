/* encoding="UTF-8" */
$(document).ready(function() {
    
    //zmienna textCookie przechowuje komunikat dot. cookies
    var textCookie = 'Strona mozesz.eu używa ciasteczek do poprawnego wyświetlania strony. Przez dalsze korzystanie z mozesz.eu (scrollowanie, zamknięcie komunikatu, kliknięcie na elementy na stronie poza komunikatem) bez zmian ustawień w zakresie prywatności, wyrażasz zgodę na przetwarzanie danych osobowych przez "Tu i teraz - Artur Kacprzak" do celów marketingowych.';
    
    //zmienna textClose definuje tekst zamknięcia panelu cookies
    var textClose = 'X';
    
    //zmienna textColor definiuje kolor tekstu komunikatu cookies
    var textColor = '#457294';

    $("#close").click(function() {
        
        setCookie('Akceptacja','tak',30);
        
        $("#MyCookie").fadeOut(1500);
    
    })

    function setCookie(name, val, days) {
        if (days) {
            var data = new Date();
            data.setTime(data.getTime() + (days * 24*60*60*1000)); //1000ms = 1s
            var expires = "; expires="+data.toGMTString();
        } else {
            var expires = "";
        }
        
        document.cookie = name + "=" + val + expires + "; path=/";
    }

    function showCookie(name) {
        if (document.cookie!="") { //jeżeli document.cookie w ogóle istnieje
            
            var cookies=document.cookie.split("; "); //tworzymy z niego tablicę ciastek
            
            for (var i=0; i<cookies.length; i++) { //i robimy po niej pętlę
                
                var cookieName=cookies[i].split("=")[0]; //nazwa ciastka
                var cookieVal=cookies[i].split("=")[1]; //wartość ciastka
            
                if (cookieName===name) {
                return cookieVal; //jeżeli znaleźliśmy ciastko o danej nazwie, wtedy zwracamy jego wartość
                }
            }
            }//else{
                //w skrocie return puste.
                return "";
                //}
    }

    var existCookie = showCookie("Akceptacja");
    
    if(existCookie){
        
        
        $("#MyCookie").hide();
    
    } else {

        
        $("#tekst").text(textCookie);
    
        $("#tekst").css('color',textColor);
    
        $("#close").html('<a href="#">' + textClose + '</a>');
    
        $("#MyCookie").hide().fadeIn(1500);
    
        }
})