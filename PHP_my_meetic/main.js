$(document).ready(function(){
    
    var selected = 0; //variable slected est initialisatier a zero
    var max = $("#slide ul li").length; // et variable max le nombre d'elements affiché
    
    $("#slide ul li").each(function(i)
    {
        if(i == 0) //si le premier element parcouru est egal a zero
        $(this).show(); //alors tu l'affiches
        else
        $(this).hide(); // sinon tu le caches
    }); 
    $("#slide #suivant").click(function(){ //quand on clique sur suivant ca execute la fonction suivante
        console.log("suivant" + selected);  
        selected += 1; //on incremente selected    
        if (selected >= max) selected = 0; // si selected est superieur a la valeur max, on retourne a zero                     
        $("#slide ul li").hide();// on cache tout
        $("#slide ul li").eq(selected).fadeIn(1000); // et on choisit l'indice qui nous interresse
        
    });
    $("#slide #precedent").click(function(){ //quand on clique sur suivant ca execute la fonction suivante
        console.log("precedent" + selected);
        selected -= 1; //on decremente selected  
        if (selected < 0) selected = max -1; // si selected est inferieur a zero                     
        $("#slide ul li").hide();// on cache tout
        $("#slide ul li").eq(selected).fadeIn(1000); // et on choisit l'indice qui nous interresse
        
    });
    
    
});