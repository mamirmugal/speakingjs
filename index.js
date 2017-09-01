function log(value){
    console.log(value);
}

// var A = {};
// A.val = "val";
//
// var B = Object.create(A);
// B.tst = "testing";
//
// var C = Object.create(B);

// log(B.val)
//
// A.val = "new valie"
// log(B.val)

// log ( A.isPrototypeOf(C) )
// log ( C.isPrototypeOf(A))

// function getDefiningObject(obj, propKey) {
//     obj = Object(obj); // make sure it’s an object
//     while (obj && !{}.hasOwnProperty.call(obj, propKey)) {
//         obj = Object.getPrototypeOf(obj);
//         // obj is null if we have reached the end
//     }
//     return obj;
// }
//
// for( var x in A)
//     console.log(x  + " " + typeof A[x])

// function Foo() {}
// var f = new Foo();
// log( f.constructor.name)


function Super(prop1){
    this.prop1 = prop1;
}
Super.prototype.methodB = function(x){
    return this.prop1 = x * 2;
};


function Sub(prop) {
    this.prop2 = prop;
}




Sub.prototype = Object.create(Super.prototype);
Sub.prototype.constructor = Sub;

Sub.prototype.methodB = function (x) {
    var superResult = Super.prototype.methodB.call(this, x);
    return this.prop2 + ' ' + superResult;
}


var subIns = new Sub(2);
// log( 'subIns instanceof Sub ' +  (subIns instanceof Sub) );
// log ( 'Sub.prototype.isPrototypeOf(subIns) ' +  Sub.prototype.isPrototypeOf(subIns));
//
// log( 'subIns instanceof Super '+ (subIns instanceof Super) );
// log( 'Super.prototype.isPrototypeOf(subIns) ' + Super.prototype.isPrototypeOf(subIns) );

log (subIns.methodB(4));

