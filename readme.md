# Speaking JS ES5

## Part III

## New in ECMAScript 5



## New Features
- `strict mode`, forbids some feature, preforms checks, and throws exceptions
- getter and setters 
```angular2html
var obj = { get foo() { return 'abc' } };
obj.foo
'abc'
```

## Syntactic Changes



### Reserved words as property keys
- using reserved as object properties
```angular2html
var obj = { new: 'abc' };
obj.new
'abc'
```



### Legal trailing commas
- Trailing commas in object literals and array literals are legal.



### Multiline string literals
- String literals can span multiple lines if you escape the end of the line via a backslash.



## New Functionality in the Standard Library
- Getting and setting prototypes
    - `Object.create()`
    - `Object.getPrototypeOf()`
    
- Managing property attributes
    - `Object.defineProperty()`
    - `Object.defineProperties()`
    - `Object.create()`
    - `Object.getOwnPropertyDescriptor()`
    
- Listing properties
    - `Object.keys()`
    - `Object.getOwnPropertyNames()`
    
- Protecting objects
    - `Object.preventExtensions()`
    - `Object.isExtensible()`
    - `Object.seal()`
    - `Object.isSealed()`
    - `Object.freeze()`
    - `Object.isFrozen()`
    
- New Function method
    - `Function.prototype.bind()`
    



### New Methods
- String
    - New method `String.prototype.trim()`
    - Access characters via the bracket operator [...]

- New `Array` methods
    - `Array.isArray()`
    - `Array.prototype.every()`
    - `Array.prototype.filter()`
    - `Array.prototype.forEach()`
    - `Array.prototype.indexOf()`
    - `Array.prototype.lastIndexOf()`
    - `Array.prototype.map()`
    - `Array.prototype.reduce()`
    - `Array.prototype.some()`

- New `Date` methods
    - `Date.now()`
    - `Date.prototype.toISOString()`
    


### JSON
- `JSON.parse()`
- `JSON.stringify()`
- Some built-in objects have special toJSON() methods
    - `Boolean.prototype.toJSON()`
    - `Number.prototype.toJSON()`
    - `String.prototype.toJSON()`
    - `Date.prototype.toJSON()`



## Tips for Working with Legacy Browsers
- (compatibility table)[http://kangax.github.io/es5-compat-table/]
