'use strict';
        let input = document.querySelector("#search");

        input.addEventListener('keyup', () => { 
            let textFind = document.querySelector('#search').value;
            let myRequest = new Request('views/pages/article/getArticle.php', {
                method  : 'POST',
                body    : JSON.stringify({ textToFind : textFind })
            })
                // On attend la réponse du fichier getArticle.php
            fetch(myRequest)
                // Récupère les données
                .then(res => res.text())

                // Exploite les données
                .then(res => {
                    document.getElementById("target").innerHTML = res;
                })
        })