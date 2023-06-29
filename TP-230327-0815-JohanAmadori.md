# TP Johan AMADORI
## BUG TAUX10.CHECKED

```js
if (taux20.checked) {
        tauxTVAvalue = 0.2;
    } else if (taux10.checked) 
        tauxTVAvalue = 0.2;
```

```diff
application.js
-- tauxTVAvalue de Taux10.checked = 0.2;
++ tauxTVAvalue = 0.1;
```

```
Correction :

Modifier la valeur de tauxTVAvalue a 0.1 car le taux10.checked prenait la mauvaise valeur (0.2) 
La valeur du MontantTVA et du PrixTTC par conséquant était faussée
```

## BUG LABEL TAUX10

```html
 <input type="radio" id="taux0" name="tauxTVA" onclick="calculerTVA()"/>
  <label for="taux0">0%</label>
  <input type="radio" id="taux10"  name="tauxTVA" onclick="calculerTVA()"/>
  <label for="taux0">10%</label>
```


```diff
TP-230327-0815-JohanAmadori.html
-- label for="taux0" 10%
++ label for="taux10" 10%
```

``` 
Correction : 

Modifier le label de l'id taux10 qui était taux0, le modifier par taux10 sinon le calcul sera le meme que pour taux0
```

## BUG ONCLICK

```HTML
  <input type="radio" id="taux20"  name="tauxTVA" checked onclick=""/>
  <label for="taux20">20%</label>
```

```diff
TP-230327-0815-JohanAmadori.html
-- checked onclick=""
++ onclick="calculerTVA()
```

``` 
Correction :

Remplacer checkedonclick qui est vide par onclick="CalculerTVA"() pour que la fonction soit appliquée et que le calcul soit fait
```

## BUG

```js

```

```diff

```

``` 
Correction :

```