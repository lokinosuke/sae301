document.getElementById('ajout').addEventListener('click',function() {
    liste = recupCookie("panier");  //recupere le cookie  sous forme de chaine de caractere
    console.log('3'+liste)
    if (liste!=null)montab = JSON.parse(liste) // transforme la chaine  en tableau JSON
    else montab =Array() // si il n'y a pas de tableau dans le cookie alors créer le tableau

    console.log("ça clique!")
    var id = document.getElementById('id').value
    var article= document.getElementById('article').innerHTML
    var prix = document.getElementById('prix').innerHTML
    var image = document.getElementById('image').src
    console.log( id + " " +"quantite" + article + prix + image)

    index = montab.findIndex(element => element.id ==id); //trouver l'article dans la liste du panier
    if(index>-1){
        console.log("l'article est deja dans le panier, il faut juste incrementer la qte")
        montab[index].quantite = parseInt(montab[index].quantite) + parseInt(document.getElementById('qte').value)
        console.log(montab)
    }
    else        {
        console.log("l'article n'est pas pour l'instant dans le panier, il va falloir l'ajouter")
        montab.push({ 'id': id, 'article': article, 'quantite': document.getElementById('qte').value , 'prix': prix, 'image': image})
        console.log(montab)
    }

    panier+=parseInt(document.getElementById('qte').value); // incrementation de la valeur du panier
    document.getElementById('panier').innerHTML=panier; // affichage de la valeur du nouveau panier
    document.cookie = "panier="+JSON.stringify(montab)+"; path=/";

})