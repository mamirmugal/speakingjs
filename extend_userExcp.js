function extend(Child, Parent){
    Child.prototype = Parent.prototype;
    Child.prototype.constructor = Child;
    Child.base = Parent.prototype;
}

function customException() {
}

customException.prototype.value = "";
customException.prototype.setError = function setError(val){
    this.value = val
}
customException.prototype.getError = function getError() {
        return this.value;
    };




function b(){
    var self = this;
    
    /*this.prototype = new customException;
		this.prototype.constructor = this;
		this.prototype.parent = customException.prototype;*/
    
    self.setVal = function setVal(){
        console.log("setval")
        this.setError("here");
    }
    
    self.getVal = function getVal(){
        console.log("getval")
        console.log(this.getError());
    }
}


extend(b, customException);


bb = new b();
bb.setVal()
bb.getVal()

