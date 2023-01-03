let artisteinput = document.getElementById("artiste");
let titreinput = document.getElementById("titre");
let buttonsearch = document.getElementById("buttonSearch")

artisteinput.addEventListener('keyup', () => {
    console.log(artisteinput.value);
})

titreinput.addEventListener('keyup', () => {
    console.log(titreinput.value)
})



function search(param1, param2) {
    const options = {
        method: 'GET',
        headers: {
            'X-RapidAPI-Key': '3ae5ca1ba8msh4684aa2b657e50fp160db2jsndbebcc17e339',
            'X-RapidAPI-Host': 'shazam.p.rapidapi.com'
        }
    };
    
    fetch(`https://shazam.p.rapidapi.com/search?term=${param1}%20${param2}&locale=fr-FR&offset=0&limit=5`, options)
        .then(response => response.json())
        .then((data) => {
            
            const result = data.tracks.hits;
            
            result.forEach(element => {
                const title = element.track['title'];
                const artist = element.track['subtitle'];

                document.querySelector('#search').innerHTML += `<option value="${title} par ${artist}">${title} par ${artist}</option>`
            });
        })
        .catch(err => console.error(err));
    }



buttonsearch.addEventListener("click", () => {
    search(artisteinput.value, titreinput.value)
})
    


