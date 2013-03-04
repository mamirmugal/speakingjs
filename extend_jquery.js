var Super = function(){
 this.member1 = 'supermember';
};

var Sub = function(){
    $.extend(this,new Super());
    
};

Sub.prototype.member3 = 'subMember3';

var s = new Sub();

s.member1
