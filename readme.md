# Speaking JS ES5

## Part III

## Statements
- `var` is used to declare variable is a statement
- equal operator is used to assign value is a statement

### Loops
- `break` and `continue` have labels, will break the second loop and continue on
```
one: {
    for (var i=0; i<10; i++){
        console.log("i " + i);

        two: {
            for (var j=0; j<10; j++){
                console.log("j " + j);
                if(j == 5){
                    break two;
                }
            }
        }

    }
}
```


### While
```
while («condition»)
    «statement»
```
- when condition is true and execute the statement
```
var arr = [ 'a', 'b', 'c' ];
while (arr.length 0) {
    console.log(arr.shift());
}
```



### do-while
```
do «statement»
while («condition»);
```
- execute the statement and then check the condition


### For
```
for (⟦«init»⟧; ⟦«condition»⟧; ⟦«post_iteration»⟧)
    «statement»
```

- with while loop
```
«init»;
while («condition») {
    «statement»
    «post_iteration»;
}
```


### for-in
```
for («variable» in «object»)
    «statement»
```

- Should not be used for arrays, it dont sames some values
```
var arr = [ 'a', 'b', 'c' ];
arr.foo = true;
for (var key in arr) { console.log(key); }
0
1
2
foo
```

- it can be used to display all properties and method if an object instance


### If-Else
- beware of `dangling else`
```
if («cond1») if («cond2») «stmt1» else «stmt2»
```

- it is better to use brackets
```
if («cond1») {
    if («cond2») {
        «stmt1»
    } else {
        «stmt2»
    }
}
```


### Switch
```
switch («expression») {
    case «label1_1»:
    case «label1_2»:
        ...
        «statements1»
        ⟦break;⟧
    case «label2_1»:
    ⟦default:
        «statements_default»
        ⟦break;⟧⟧
}
```
- switch expression is compared with `===`
- `return` and `throw` also works instead of break, but if non is given then js will move to next case
```
function categorizeColor(color) {
    var result;
    switch (color) {
        case 'red':
        case 'yellow':
        case 'blue': // this statement will run when value is red, yellow and blue
            result = 'Primary color: '+color;
            break;
        default:
            throw 'Illegal argument: '+color;
    }
    console.log(result);
}

categorizeColor('red')
Primary color: red

categorizeColor('yellow')
Primary color: yellow

categorizeColor('blue')
Primary color: blue
```


### The with Statement
**NOTE** The with Statement Is Deprecated

```
with («object»)
    «statement»
```

- It turns the properties of object into local variables for statement
```
var obj = { first: 'John' };
with (obj) {
    console.log('Hello '+first); // Hello John
}
```

- it is also used to assign value to complex objects
```
foo.bar.baz.bla   = 123;
foo.bar.baz.yadda = 'abc';

with (foo.bar.baz) {
    bla   = 123;
    yadda = 'abc';
}

```
