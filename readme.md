# Speaking JS ES5

## Part III

## Exception Handling
- here are two aspects to exception handling:
    - If there is a problem that can’t be handled meaningfully where it occurs, throw an exception.
    - Find a place where errors can be handled: catch exceptions.



### Exception Handling in JavaScript
- throw, always use error constructor, never use simple string
```
if (somethingBadHappened) {
    throw new Error('Something bad happened');
}
```


### try-catch-finally
- `try` is mandatory, and at least one of `catch` and `finally` must be there, too
```
try {
    «try_statements»
}
⟦catch («exceptionVar») {
   «catch_statements»
}⟧
⟦finally {
   «finally_statements»
}⟧
```


### Example
```
function throwIt(exception) {
    try {
        throw exception;
    } catch (e) {
        console.log('Caught: '+e);
    }
}

```


### Finally
- it is return in every cost
```
function idLog(x) {
    try {
        console.log(x);
        return 'result';
    } finally {
        console.log("FINALLY");
    }
}

idLog('arg')
arg
FINALLY
'result'
```

```
var count = 0;
function countUp() {
    try {
        return count;
    } finally {
        count++;  // (1)
    }
}

countUp()
0
count
1
```


### Stack Traces
```
function catchIt() {
    try {
        throwIt();
    } catch (e) {
        console.log(e.stack); // print stack trace
    }
}
function throwIt() {
    throw new Error('');
}

catchIt()
Error
    at throwIt (~/examples/throwcatch.js:9:11)
    at catchIt (~/examples/throwcatch.js:3:9)
    at repl:1:5

```


### Error Constructors
- error properties
    - message
        - The error message.
    - name
        - The name of the error.
    - stack
        - A stack trace. This is nonstandard, but is available on many platforms—for example, Chrome, Node.js, and Firefox.

- Error, generic error
- RangeError "indicates a numeric value has exceeded the allowable range."
```
new Array(-1)
RangeError: Invalid array length
```

- ReferenceError "indicates that an invalid reference value has been detected."
```
unknownVariable
ReferenceError: unknownVariable is not defined
```

- SyntaxError "indicates that a parsing error has occurred"
```
3..1
SyntaxError: Unexpected number '.1'. Parse error.
eval('5 +')
SyntaxError: Unexpected end of script
```

- TypeError "indicates the actual type of an operand is different than the expected type."
```
undefined.foo
TypeError: Cannot read property 'foo' of undefined
```

- URIError "indicates that one of the global URI handling functions was used in a way that is incompatible with its definition."
```
decodeURI('%2')
URIError: URI malformed
```
