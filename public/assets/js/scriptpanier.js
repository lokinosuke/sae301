liste = recupCookie("panier");  //recupere le cookie  sous forme de chaine de caractere
if (liste!=null)montab = JSON.parse(liste) // transforme la chaine  en tableau JSON
else montab =Array() // si il n'y a pas de tableau dans le cookie alors créer le tableau
console.log(montab)
document.getElementById('liste').value=JSON.stringify(montab); // sauver montab pour le formulaire

var totalgeneral=0
montab.forEach(uneinfo => {

    html =`

<div class="card rounded-3 mb-4">
<div div class="card-body p-4">
<div id="${uneinfo.id}" class="row d-flex justify-content-between align-items-center">
<div class="col-md-2 col-lg-2 col-xl-2"> <img src="${uneinfo.image}" class="img-fluid rounded-3" alt="Concert"></div>
<div class="col-md-3 col-lg-3 col-xl-3"><p class="lead fw-normal mb-2">${uneinfo.article}</p><span class="text-muted">prix unitaire: </span><span class="unitaire">${uneinfo.prix}</span>€</div>
<div class="col-md-3 col-lg-3 col-xl-2 d-flex" style="gap: 7%;"><button class="moins">-</button><span>${uneinfo.quantite}</span><button class="plus">+</button></div>
<div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1"><span class="mb-0 prix">${uneinfo.prix}*${uneinfo.quantite}</span>€</div>
<div class="col-md-1 col-lg-1 col-xl-1 text-end"><a href="#!" class="text-danger"><box-icon name='trash-alt' type='solid' color='#f56c6c' ></box-icon></a></div>
</div>
</div>
</div>
`;

    document.getElementById('zone').innerHTML += html
    totalgeneral += uneinfo.prix * uneinfo.quantite
})
document.getElementById('total').innerHTML = totalgeneral


document.querySelectorAll('.plus').forEach(clickplus)
function clickplus(tag){
    tag.addEventListener('click',function() {
        qte=this.parentNode.querySelector('span').innerHTML;
        qte++;
        panier++;
        document.getElementById('panier').innerHTML=panier;
        this.parentNode.querySelector('span').innerHTML=qte;
        prix=this.parentNode.parentNode.querySelector('.unitaire').innerHTML;
        total= prix*qte;
        this.parentNode.parentNode.querySelector('.prix').innerHTML=total;

        id = this.parentNode.parentNode.id;
        index = montab.findIndex(element => element.id ==id);
        montab[index].quantite	= parseInt(montab[index].quantite) +1;
        document.cookie = "panier="+JSON.stringify(montab)+"; path=/";
        document.getElementById('liste').value=JSON.stringify(montab);
        console.log(montab)
        totalgeneral += 1*prix
        document.querySelector('#total').innerHTML=totalgeneral
        console.log(montab)
    })
}


document.querySelectorAll('.moins').forEach(clickmoins)
function clickmoins(tag){
    tag.addEventListener('click',function() {
        qte=this.parentNode.querySelector('span').innerHTML;
        if (qte>0){qte--};
        this.parentNode.querySelector('span').innerHTML=qte;
        prix=this.parentNode.parentNode.querySelector('.unitaire').innerHTML;
        total= prix*qte;
        this.parentNode.parentNode.querySelector('.prix').innerHTML=total;

        if (qte<0){qte--};
        panier--;
        document.getElementById('panier').innerHTML=panier;


        id = this.parentNode.parentNode.id;
        index = montab.findIndex(element => element.id ==id);
        montab[index].quantite	= parseInt(montab[index].quantite) -1;
        document.cookie = "panier="+JSON.stringify(montab)+"; path=/";
        document.getElementById('liste').value=JSON.stringify(montab);
        console.log(montab)
        totalgeneral -= 1*prix
        document.querySelector('#total').innerHTML=totalgeneral
        console.log(montab)
    })

    function recupCookie(nom) {

        if (document.cookie.length == 0) return null;

        var cookies = document.cookie.split("; "); //separe chaque parametre contenu dans le cookie
        cookies.forEach(element => {
            ligne = element.split("=");
            if (ligne[0] === nom) sortie = ligne[1]
            else sortie = null;
        })
        return sortie
    }
}

