document.addEventListener("DOMContentLoaded",function(){
    let result = document.getElementById("result");
    let button = document.getElementById("lookup");
    let named = document.getElementById("country");
    const country = new XMLHttpRequest();

    function listcountries(){
        if (country.readyState === XMLHttpRequest.DONE){
            if (country.status === 200){
                let countryList = country.responseText;
                result.innerHTML = countryList;
            }
            else{
                alert("A mistake was made with my code.");
            }
        }
    }

    button.addEventListener("click",function(){
        let nameText = named.value;
        nameText = nameText.trim();
        country.onreadystatechange = listcountries;
        country.open("GET","world.php?country="+nameText);
        country.send();
})

})
