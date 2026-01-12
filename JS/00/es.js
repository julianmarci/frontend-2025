//Stampara Mercoledì 26 Novembre 2025
function escercizio1() {
    data = new Date(giorno + "/" + mese + "/" + anno);
    data.getDate()
    window.prompt ("Get dates and check if corresponding data is after, before or today, 26 November 2025");
var day = data.getDay();
var month = data.getMonth();
var year = data.getFullYear();
var months = ["Gennaio", "Febbraio", "Marzo", "Aprile", "Maggio", "Giugno", "Luglio", "Agosto", "Settembre", "Ottobre", "Novembre", "Dicembre"];
var days = ["Lunedì", "Martedì", "Mercoledì", "Giovedì", "Venerdì", "Sabato", "Domenica"];
data = days[day] + " " + data.getDate() + " " + months[month] + " " + year;

if
    (day < 26) {
        if (month < 11) {
            if (year < 2025) {
                return "Data precedente al 26 Novembre 2025";
            }
        }
    } if
    (day == 26) {
        if (month == 11) {
            if (year == 2025) {
                return "Data uguale al 26 Novembre 2025";
            }
        }
    } else {
        return "Data successiva al 26 Novembre 2025";
    }
    return data;
}