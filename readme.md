# Speaking JS ES5

## Part IV

## Module Systems and Package Managers
- JS has no built in support for modules
- but there are libraries which support modules



## Module Systems
- CommonJS Modules (CJS)
    - it is drived from nodejs modules
    - mainly used on server side
    - designed for sync loading

- Asynchronous Module Definition (AMD)
    - designed with async loading
    - mainly for browsers
    


### Package Managers
- `Bower` is a package manager for the Web that supports both AMD and CJS.
- `Browserify` is a tool based on npm that compiles npm packages to something you can use in a browser.



### Quick and Dirty Modules
```angular2html
var moduleName = function () {
    function privateFunction () { ... }
    function publicFunction(...) {
        privateFunction();
        otherModule.doSomething();  // implicit import
    }
    return { // exports
        publicFunction: publicFunction
    };
}();


<script src="modules/otherModule.js"></script>
<script src="modules/moduleName.js"></script>
<script type="text/javascript">
    moduleName.publicFunction(...);
</script>
```

- Reference
- Basic structure of module pattern
[Reveling Module Pattern](https://addyosmani.com/resources/essentialjsdesignpatterns/book/#revealingmodulepatternjavascript)