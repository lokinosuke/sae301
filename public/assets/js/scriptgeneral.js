liste = recupCookie("panier");
if (liste!=="")montab = JSON.parse(liste)
else montab =Array()
console.log(montab)

var panier = 0
montab.forEach(element => {   panier += parseInt(element.quantite) })
document.getElementById('panier').innerHTML=panier
console.log(montab)

function recupCookie(nom){

    if(document.cookie.length == 0)return null;

    var cookies = document.cookie.split("; "); //separe chaque parametre contenu dans le cookie
    cookies.forEach(element => {
        ligne=element.split("=");
        if(ligne[0]===nom) sortie =ligne[1]
        else sortie=null;
    })
    return sortie
}

$("#new_edit_utilisateur").on('submit', function(){
    if($("#utilisateur_password").val() != $("#verifpass").val()) {
        //implémntez votre code
        alert("Les deux mots de passe saisies sont différents");
        alert("Merci de renouveler l'opération");
        return false;
    }
})