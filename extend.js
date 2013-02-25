function Super () {
  this.member1 = 'superMember1';
}

//Super.prototype.member2 = 'superMember2';

function Sub() {
    self = this;
  self.member3 = 'subMember3';
  self.show = function show(){
    console.log("call "+self.member1);
  }
  
}

Sub.prototype = new Super();

var sub = new Sub();
sub.show();
sub.member1 = "amir"
sub.show();

var sub1 = new Sub();
sub1.show();
