function border_color(imgId){
	var img=document.getElementById(imgId);
	var canvas = document.createElement('canvas');
	var context = canvas.getContext('2d');
	context.drawImage(img);
	var imgd = context.getImageData(0, 0, w, h)
	var pixels = imgd.data;
	var i;
	var r; var g; var b; var countAll;
	for (i = 0; i < imgData.data.length; i += 4) {
		r+=pixels[i+0];
		g+=pixels[i+1];
		b+=pixels[i+2];
		countAll++;
		
	}
	r=r/countAll;
	g=g/countAll;
	b=b/countAll;
	img.style.borderColor=rgb(r,g,b);
}