function calculerTVA(){
    let MontantHTvalue = MontantHT.value;
    let TauxTVAvalue;

    if (Taux0.checked){
        TauxTVAvalue = 0         
    }

    if (Taux10.checked){
        TauxTVAvalue = 0.10   
    }

    else if (Taux20.checked){
        TauxTVAvalue = 0.20    
    }


 let MontantTVAvalue = TauxTVAvalue * MontantHTvalue 
 let MontantTTCvalue = MontantHTvalue * 1 + MontantTVAvalue 

 MontantTVA.value = MontantTVAvalue.toFixed(2);
 MontantTTC.value = MontantTTCvalue.toFixed(2);


}


/// MontantTVA = TauxTVA * MontantHT