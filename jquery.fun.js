function foo(x) {
  var tmp = 3;
  console.log(tmp + " " + x)
  return function (y) {
    console.log(x + y + (++tmp));
  }
}
var bar = foo(2); // bar is now a closure.
bar(10);
