function A(){ 

    this.getPrivate = function(){ 
        console.log("ret " + this.p)
    }; 

    this.setPrivate = function(_private){ 
          this.p = _private; 
    }; 
}

function B(){};

B.prototype = new A();

b1 = new B();
b2 = new B();

b1.setPrivate("b1");
b2.getPrivate();
