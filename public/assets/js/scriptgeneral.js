liste = recupCookie("panier");
if (liste!==null)montab = JSON.parse(liste)
else montab =Array()
console.log('1'+montab)


var panier = 0
montab.forEach(element => {   panier += element.quantite })
document.getElementById('panier').innerHTML=panier
console.log('2'+montab)

function recupCookie(nom){
console.log(nom)
    if(document.cookie.length == 0)return null;

    var cookies = document.cookie.split("; "); //separe chaque parametre contenu dans le cookie
    cookies.forEach(element => {
        ligne=element.split("=");
        if(ligne[0]===nom) sortie =ligne[1]
        else sortie=null;
    })
    return sortie
}