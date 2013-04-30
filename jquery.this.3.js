// A function being attached to an object at runtime.
var myName = "the global object";
var sayHello = function() {
    console.log( "Hi! My name is " + this.myName );
};
var myObject = {
    myName: "Rebecca"
};
var secondObject = {
    myName: "Colin"
};
 
myObject.sayHello = sayHello;
secondObject.sayHello = sayHello;
 
sayHello();              // "Hi! My name is the global object"
myObject.sayHello();     // "Hi! My name is Rebecca"
secondObject.sayHello(); // "Hi! My name is Colin"
