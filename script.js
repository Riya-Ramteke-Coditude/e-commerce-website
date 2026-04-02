function subscribe(){

let email = document.querySelector("input").value;

if(email === ""){
alert("Please enter email");
}
else{
alert("Subscribed successfully!");
}

}

let images = [
"chrgers/infinity/img1.png",
"chargers/infinity/img2.png",
"chargers/infinity/img3.png"
];

let index = 0;

function showImage(){
document.getElementById("productImg").src = images[index];
}

function nextImage(){
index++;

if(index >= images.length){
index = 0;
}

showImage();
}

function prevImage(){
index--;

if(index < 0){
index = images.length - 1;
}

showImage();
}