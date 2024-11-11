
document.getElementById("fileInput").addEventListener("change", function(event) {
    const file = event.target.files[0];
    
    if (file) {
        const reader = new FileReader();
        
        reader.onload = function(e) {
            const img = new Image();
            img.src = e.target.result;
            
            img.onload = function() {
                const canvas = document.createElement("canvas");
                const ctx = canvas.getContext("2d");
                
                
                const maxWidth = 300; 
                const scale = maxWidth / img.width;
                canvas.width = maxWidth;
                canvas.height = img.height * scale;
                
                ctx.drawImage(img, 0, 0, canvas.width, canvas.height);
                
                
                const resizedImage = canvas.toDataURL("image/jpeg", 0.7); 
                
                
                const imgElement = document.getElementById("profileImage");
                imgElement.src = resizedImage;
            };
        };
        
        reader.readAsDataURL(file);  
    }
});

document.getElementById("saveBtn").addEventListener("click", function() {
    const imageSrc = document.getElementById("profileImage").src;
    
    if (imageSrc) {
        try {
            
            localStorage.setItem("profileImage", imageSrc);
            alert("Profile picture saved!");
        } catch (e) {
            alert("Failed to save the image: " + e.message);
        }
    } else {
        alert("Please upload a picture first!");
    }
});


window.onload = function() {
    const savedImage = localStorage.getItem("profileImage");
    
    if (savedImage) {
        document.getElementById("profileImage").src = savedImage;
    }
};
