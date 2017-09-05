# Speaking JS ES5

## Part IV

## JSDoc: Generating API Documentation
- Same as php with some variations
```angular2html
/** @namespace */
var util = {
    /**
     * Repeat <tt>str</tt> several times.
     * @param {string} str The string to repeat.
     * @param {number} [times=1] How many times to repeat the string.
     * @returns {string}
     */
    repeat: function(str, times) {
        if (times === undefined || times < 1) {
            times = 1;
        }
        return new Array(times+1).join(str);
    }
};
```



## The Basics of JSDoc



### Syntax
```angular2html
/**
 * Repeat <tt>str</tt> several times.
 * @param {string} str The string to repeat.
 * @param {number} [times=1] How many times to repeat the string.
 * @returns {string|number}
 */
```



## Basic Tags
- `@fileOverview`
    - it describes the whole file

- `@author`
- `@deprecated`
- `@example`
- `@see`
    - Points to a related resource
```angular2html
/**
 * @see MyConstructor#myMethod
 * @see The <a href="http://example.com">Example Project</a>.
 */
```
- `@version`
- `@since`



## Documenting Functions and Methods
- syntax to follow
```angular2html
@param {paramType} paramName description
```

- `@returns {returnType} description`
- `@throws {exceptionType} description`



## Documenting Variables, Parameters, and Instance Properties
- `@type {typeName}`
```angular2html
/** @type {number} */
var carCounter = 0;
```
- `@constant`
```angular2html
/** @constant */
var FORD = 'Ford';
```

- `@property {propType} propKey description`
```angular2html
/**
 * @constructor
 * @property {string} name The name of the person.
 */
function Person(name) {
    this.name = name;
}

/**
 * @class
 */
function Person(name) {
    /**
     * The name of the person.
     * @type {string}
     */
    this.name = name;
}
```

- `@default defaultValue`
```angular2html
/** @constructor */
function Page(title) {
    /**
     * @default 'Untitled'
     */
     this.title = title || 'Untitled';
}
```



## Documenting Classes
- `@constructor`
- `@class`
- `@constructs`
- `@memberof parentNamePath`



### Defining a Class via an Object Literal
```angular2html
/**
 * A class for managing persons.
 * @class
 */
var Person = makeClass(
    /** @lends Person# */
    {
        say: function(message) {
            return 'This person says: ' + message;
        }
    }
);
```



### Defining a Class via an Object Literal with an @constructs Method
```angular2html
 /** @lends Person# */
    {
        /**
         * A class for managing persons.
         * @constructs
         */
        initialize: function(name) {
            this.name = name;
        },
        say: function(message) {
            return this.name + ' says: ' + message;
        }
    }
);
```



### Subclassing
```angular2html
/**
 * @constructor
 * @extends Person
 */
function Programmer(name) {
    Person.call(this, name);
    ...
}
``` 



### Other Useful Tags
- Modularity
    - `@module`
    - `@exports`
    - `@namespace`
    
- Custom types
    - @typedef
    - @callback
