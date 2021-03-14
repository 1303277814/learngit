// 实现打字效果的js,使用if语句得到想要的效果，真期待哪天可以不用抄而是自己写出算法
var count = 0;
var typing_text = "Kratos's Blog<br> A   small   World";

var myBlock = document.getElementById('blog_main');
function type(){
    if(count <= typing_text.length){
        myBlock.innerHTML = typing_text.substring(0,count);
        count++;
    }
    else{
        window.clearInterval(intervalID);

    }
}
var intervalID = window.setInterval(type,50);


