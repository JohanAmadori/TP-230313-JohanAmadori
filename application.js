function calculerPrixTotal() {
    // * 1 => to number
    let montantHTvalue = montantHT.value * 1; 
    let tauxTVAvalue;
    if (taux20.checked) {
        tauxTVAvalue = 0.2;
    } else if (taux10.checked) {
        tauxTVAvalue = 0.1;
    } else if (taux0.checked) {
        tauxTVAvalue = 0;
    } else {
        console.log('Taux TVA inconnu');
    }
    let montantTVAvalue = montantHTvalue * tauxTVAvalue;
    let prixTTCvalue = montantHTvalue + montantTVAvalue;

    montantTVA.value = montantTVAvalue.toFixed(2);
    prixTTC.value = prixTTCvalue.toFixed(2);

    if (eco0.checked) {
        EcoTaxevalue = 0;
    } else if (eco2.checked) {
        EcoTaxevalue = 2;
    } else if (eco5.checked) {
        EcoTaxevalue = 5;
    } else {
        console.log('Taux Eco inconnu');
    }

    prixTotalvalue = prixTTCvalue + EcoTaxevalue;
    prixTotal.value = prixTotalvalue.toFixed(2);
}








function hello(message) {
    alert(message);
}