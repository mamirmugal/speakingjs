function extend(Child, Parent){
    Child.prototype = Parent.prototype;
    Child.prototype.constructor = Child;
    Child.base = Parent.prototype;
}

function BaseClass(){
    self = this
    self.call = function call(){
        console.log("here");
    }
}

BaseClass.prototype.randomNumber = 0;
BaseClass.prototype.functionA = function(a){
     this.randomNumber = a;
     this.functionB();
}

BaseClass.prototype.functionB = function(){
     console.log(this.randomNumber);
}

function ChildClass(){
    this.functionB = function(){
         ChildClass.base.functionB();
    };
}

extend(ChildClass, BaseClass); 
var childInstance = new ChildClass();
childInstance.functionA(200);
//childInstance.call()
