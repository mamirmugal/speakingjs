# Speaking JS ES5

## Part III

## Arrays
- they represent element with natural number starting from zero
- mostly created by array literal
```
var arr = [ 'a', 'b', 'c' ]; // array literal
arr[0]  // get element 0
'a'

arr[0] = 'x';                 // set element 0
arr
[ 'x', 'b', 'c' ]
```

- we can use `length` to remove elements from the end of array
```
var arr = [ 'a', 'b', 'c' ];
arr.length
3

arr.length = 2;           // remove an element
arr
[ 'a', 'b' ]

arr[arr.length] = 'd';    // append an element
arr
[ 'a', 'b', 'd' ]
```

- another way to add elements is push method
```
var arr = [ 'a', 'b' ];
arr.push('d')
3

arr
[ 'a', 'b', 'd' ]
```

- Array can also have holes in them, non-contiguous
```
var arr = [];
arr[0] = 'a';
'a'

arr[2] = 'b';
'b'

arr
[ 'a', , 'b' ]
```

- Array an also have properties, as they are object as well
```
var arr = [ 'a', 'b' ];
arr.foo = 123;
arr
[ 'a', 'b' ]

arr.foo
123
```



### Creating Arrays
- their trail commas can be ignored
```
[ 'a', 'b' ].length
2

[ 'a', 'b', ].length
2

[ 'a', 'b', ,].length  // hole + trailing comma
3
```



#### The Array Constructor
- array can be created using constructor
- it can be created using `new` keyword and without, both will give same results
- array can be created with specific length
```
var arr = new Array(2);
arr.length
2

arr           // two holes plus trailing comma (ignored!)
[ , ,]

arr.push(1)     // pushing value will add value to the end
arr.length
3

arr[0] = 2      // we need to add value to specific location
arr.length
3
```
**Note: with specific length `push` should not be used as it will add to the end of the array, increasing the array's length**
**Note: with specific length value should be added at specific location to keep the array at specific length**

- creating array with array literal or constructor is same
- but they cannot be used in same manner
- array constructor can take arguments, but array literal cannot
```
// The same as ['a', 'b', 'c']:
var arr1 = new Array('a', 'b', 'c');


new Array(2)  // alas, not [ 2 ]
[ , ,]

new Array(5.7)  // alas, not [ 5.7 ]
RangeError: Invalid array length

new Array('abc')  // ok
[ 'abc' ]
```



### Multidimensional Arrays
- array within array
- it can be create by array literal
```
var rows = [ ['.','.','.'], ['.','.','.'], ['.','.','.'] ];
```

- or by using nested `for-loop`
```
var rows = [];
for (var rowCount=0; rowCount < 3; rowCount++) {
    rows[rowCount] = [];
    for (var colCount=0; colCount < 3; colCount++) {
        rows[rowCount][colCount] = '.';
    }
}
```



## Array Indices
- indices are number ranging from 0 to 2<sup>32</sup>-1
- string and negative values are not represented by arrays
```
var arr = [];

arr[-1] = 'a';
arr
[]

arr['-1']
'a'

arr[4294967296] = 'b';
arr
[]

arr['4294967296']
'b'
```



#### The in Operator and Indices
- `in` operator is to check if the property exists in an object
- but it can also be used to check if `index` exists
```
var arr = [ 'a', , 'b' ];
0 in arr
true

1 in arr
false

10 in arr
false
```



#### Deleting Array Elements
- `delete` keyword can be used to delete array elements
- it creates array holes
- **Note: it does not update length, length remains the same**
```
var arr = [ 'a', 'b' ];
arr.length
2

delete arr[1]  // does not update length
true

arr
[ 'a',  ]

arr.length
2
```

- workaround is to use `slice` method
```
var arr = ['a', 'b', 'c', 'd'];
arr.splice(1, 2) // returns what has been removed
[ 'b', 'c' ]

arr
[ 'a', 'd' ]
```


### Array indices
- index can be in string, because they are parsed
```
var a = ['a', 'b', 'c', 'd', 'e']
a.length
5

a[31] = 'z'
a.length
32

a['3'+'1']
"z"
```

- if the parsed value dont return number it will work
```
a['3a'+'1']
undefined
```



## length
- basic property of length is to track the largest index in an array
```
[ 'a', 'b' ].length
2

[ 'a', , 'b' ].length
3
```

- the length dont count the number of elements
- a custom function to count the array elements, using `forEach`
```
function countElements(arr) {
    var elemCount = 0;
    arr.forEach(function () {
        elemCount++;
    });
    return elemCount;
}
```

```
countElements([ 'a', 'b' ])
2

countElements([ 'a', , 'b' ])
2
```


### Manually Increasing the Length of an Array
- increasing length will just create an hole
```
var arr = [ 'a', 'b' ];
arr.length = 3;
arr  // one hole at the end
[ 'a', 'b', ,]
```

- however the length is the pointer where to enter next element
```
arr.push('c')
4

arr
[ 'a', 'b', , 'c' ]
```

- so creating an array with specific length is an empty array



### Decreasing the Length of an Array
- will delete the elements in an array
```
var arr = [ 'a', 'b', 'c' ];
1 in arr
true

arr[1]
'b'


arr.length = 1;
arr
[ 'a' ]

1 in arr
false

arr[1]
undefined
```



#### Clearing an array
- setting length to zero will empty array
```
function clearArray(arr) {
    arr.length = 0;
}
```
- however this process is slow and overriding will be better option
```
arr = [];
```



#### Clearing shared elements
- emptying an array by setting length to zero will affect all shared arrays
```
var a1 = [1, 2, 3];
var a2 = a1;
a1.length = 0;

a1
[]

a2
[]
```

- however reassigning array will not affect the rest of the shared arrays
```
var a1 = [1, 2, 3];
var a2 = a1;
a1 = [];

a1
[]

a2
[ 1, 2, 3 ]

```




## Holes in Arrays
- holes need to avoided
- they affect performance negatively
- if receiving value of hole will give `undefined`



### Creating Holes
- by adding value on different indexes
```
var arr = [];
arr[0] = 'a';
arr[2] = 'c';
1 in arr  // hole at index 1
false
```

- by omitting values
```
var arr = ['a',,'c'];
1 in arr  // hole at index 1
false
```



### Sparse Arrays Versus Dense Arrays
- dense array has values on each index
- sparse array has holes
**Note: Assigning `undefined` is also treated as value**
```
var sparse = [ , , 'c' ];
var dense  = [ undefined, undefined, 'c' ];
```

- both array have same length
```
sparse.length
3
dense.length
3
```

- but sparse array dont have element on first index
```
0 in sparse
false
0 in dense
true
```

- but iterating through array with `for` will give same results
```
for (var i=0; i<sparse.length; i++) 
	console.log(sparse[i]);
undefined
undefined
c

for (var i=0; i<dense.length; i++) 
	console.log(dense[i]);
undefined
undefined
c
```

- but iterating with `forEach` will not read holes
```
sparse.forEach(function (x) { console.log(x) });
c

dense.forEach(function (x) { console.log(x) });
undefined
undefined
c
```



### Which Operations Ignore Holes, and Which Consider Them?
- some operations ignore holes other dont

- `forEach() skips holes`
```
['a',, 'b'].forEach(function (x,i) {
    console.log(i+'.'+x)
})
0.a
2.b
```

- `every will skip holes`
```
['a',, 'b'].every(function (x) {
    return typeof x === 'string'
})
true
```

- `map() skips, but preserves holes`
```
['a',, 'b'].map(function (x,i) { return i+'.'+x })
[ '0.a', , '2.b' ]
```

- `filter() eliminates holes`
```
['a',, 'b'].filter(function (x) { return true })
[ 'a', 'b' ]
```

- `join() converts holes, undefineds, and nulls to empty strings`
```
['a',, 'b'].join('-')
'a--b'

[ 'a', undefined, 'b' ].join('-')
'a--b'
```

- `sort() preserves holes while sorting`
```
['a',, 'b'].sort()  // length of result is 3
[ 'a', 'b', ,  ]
```

- `for-in skips holes`
```
for (var key in ['a',, 'b']) { console.log(key) }
0
2
```

#### Function.prototype.apply()
- apply() turns each hole into an argument whose value is undefined
```
function f() { return [].slice.call(arguments) }
f.apply(null, [ , , ,])
[ undefined, undefined, undefined ]
```

- we can also use `Array`
```
Array.apply(null, Array(3))
[ undefined, undefined, undefined ]
```



### Removing Holes from Arrays
- we can use `filter` method to remove holes



## Array Constructor Method
- `Array.isArray(obj)`
    - return true if `obj` is an array



## Array Prototype Methods
- `destructive`, will change the array
- `non-destructive`, will not change the array, such methods return new array



## Adding and Removing Elements (Destructive)
- these method will change the array itself
- `Array.prototype.shift()`
    - will remove the elements from `0` index, return that element
```
var arr = [ 'a', 'b' ];
arr.shift()
'a'

arr
[ 'b' ]
```

- `Array.prototype.unshift(elem1?, elem2?, ...)`
    - prepends new elements and return array length
```
var arr = [ 'c', 'd' ];
arr.unshift('a', 'b')
4

arr
[ 'a', 'b', 'c', 'd' ]
```

- `Array.prototype.pop()`
    - remove elements from end of array and returns it
```
var arr = [ 'a', 'b' ];
arr.pop()
'b'

arr
[ 'a' ]
```

- `Array.prototype.push(elem1?, elem2?, ...)`
    - add elements at the end of array and return the new length
```
var arr = [ 'a', 'b' ];
arr.push('c', 'd')
4

arr
[ 'a', 'b', 'c', 'd' ]
```

- `Array.prototype.apply(array1, array2)`
    - add second array to first array
```
var arr1 = [ 'a', 'b' ];
var arr2 = [ 'c', 'd' ];

Array.prototype.push.apply(arr1, arr2)
4

arr1
[ 'a', 'b', 'c', 'd' ]
```

- `Array.prototype.splice(start, deleteCount?, elem1?, elem2?, ...)`
    - `deleteCount` till where should it delete it
    - from 3 value are elements to be added
    - return removed elements
```
var arr = [ 'a', 'b', 'c', 'd' ];
arr.splice(1, 2, 'X', 'Y');
[ 'b', 'c' ]

arr
[ 'a', 'X', 'Y', 'd' ]
```

- if only `start` is provided and `deleteCount` is not provided then the rest is removed
```
var arr = [ 'a', 'b', 'c', 'd' ];
arr.splice(1);
["b", "c", "d"]

arr
["a"]
```

- if start is `negative` then, elements will be removed from the end
```
var arr = [ 'a', 'b', 'c', 'd' ];
arr.splice(-2)
[ 'c', 'd' ]

arr
[ 'a', 'b' ]
```



### Sorting and Reversing Elements (Destructive)
- `Array.prototype.reverse()`
    - Reverses the order of the elements in the array and returns a reference to the original (modified) array
```
var arr = [ 'a', 'b', 'c' ];
arr.reverse()
[ 'c', 'b', 'a' ]

arr // reversing happened in place
[ 'c', 'b', 'a' ]
```

- `Array.prototype.sort(compareFunction?)`
    - Sorts the array and returns it

```
var arr = ['banana', 'apple', 'pear', 'orange'];
arr.sort()
[ 'apple', 'banana', 'orange', 'pear' ]

arr  // sorting happened in place
[ 'apple', 'banana', 'orange', 'pear' ]
```

- Sorting is done by converting the number to string
```
[-1, -20, 7, 50].sort()
[ -1, -20, 50, 7 ]
```



### Comparing Numbers
- a custom code can be used to compare values
```
function compareCanonically(a, b) {
    if (a < b) {
        return -1;
    } else if (a b) {
        return 1;
    } else {
        return 0;
    }
}

[-1, -20, 7, 50].sort(compareCanonically)
[ -20, -1, 7, 50 ]
```



### Comparing Strings
- `localeCompare` can we used to compare strings
```
['c', 'a', 'b'].sort(function (a,b) { return a.localeCompare(b) })
[ 'a', 'b', 'c' ]
```



### Comparing Objects
- custom method can be made to compare object value
```
var arr = [
    { name: 'Tarzan' },
    { name: 'Cheeta' },
    { name: 'Jane' } ];

function compareNames(a,b) {
    return a.name.localeCompare(b.name);
}

arr.sort(compareNames)
[ { name: 'Cheeta' },
  { name: 'Jane' },
  { name: 'Tarzan' } ]

```




### Concatenating, Slicing, Joining (Nondestructive)
- `Array.prototype.concat(arr1?, arr2?, ...)`
    - merge array at the end
```
var arr = [ 'a', 'b' ];
var newArray = arr.concat('c', ['d', 'e'])
[ 'a', 'b', 'c', 'd', 'e' ]
```

- `Array.prototype.slice(begin?, end?)`
    - Copies array elements into a new array, starting at begin, until and excluding the element at end
```
[ 'a', 'b', 'c', 'd' ].slice(1, 3)
[ 'b', 'c' ]
```

- If end is missing, the array length is used:
```
[ 'a', 'b', 'c', 'd' ].slice(1)
[ 'b', 'c', 'd' ]
```

- If both indices are missing, the array is copied:
```
[ 'a', 'b', 'c', 'd' ].slice()
[ 'a', 'b', 'c', 'd' ]
```

- if start is negative then last element are skipped
```
[ 'a', 'b', 'c', 'd' ].slice(-2)
[ 'c', 'd' ]
```

- if the second param is negative then the array will copy from start to reverse end
```
[ 'a', 'b', 'c', 'd' ].slice(1, -1)
[ 'b', 'c' ]
```

- `Array.prototype.join(separator?)`
    - `toString` will join the array with comas
```
var i = ["a", "b", "c", "d"]
i.toString()
"a,b,c,d"
```

- `join` will glue the array with specified string
```
[3, 4, 5].join('-')
'3-4-5'

[3, 4, 5].join()
'3,4,5'

[3, 4, 5].join('')
'345'
```

- `join()` converts undefined and null to empty strings
```
[undefined, null].join('#')
'#'
```

- Holes in arrays are also converted to empty strings:
```
['a',, 'b'].join('-')
'a--b'
```



## Searching for Values (Nondestructive)
- `Array.prototype.indexOf(searchValue, startIndex?)`
    - first param is the search value which will return the index value
    - second is to start from where
```
[ 3, 1, 17, 1, 4 ].indexOf(1)
1

[ 3, 1, 17, 1, 4 ].indexOf(1, 2)
3
```

- `Array.prototype.lastIndexOf(searchElement, startIndex?)`
    - same as `indexOf` but start searching from the end
```
[ 3, 1, 17, 1, 4 ].lastIndexOf(1)
3

[ 3, 1, 17, 1, 4 ].lastIndexOf(1, -3)
1
```



## Iteration (Nondestructive)
- signature `arr.examinationMethod(callback, thisValue?)`
- these method have a unique signature with first param as `callback` and second param as `value`
- the `callback` takes 3 param `function callback(element, index, array)`

- `Array.prototype.forEach(callback, thisValue?)`
    - Iterates over the elements of an array
```
var arr = [ 'apple', 'pear', 'orange' ];
arr.forEach(function (elem) {
    console.log(elem);
});
```

- `Array.prototype.every(callback, thisValue?)`
    - Returns true if the callback returns true for every element.
    - It stops iteration as soon as the callback returns false
    - **Note: if value is not returned the `undefined is returned**
```
function isEven(x) { return x % 2 === 0 }
[ 2, 4, 6 ].every(isEven)
true

[ 2, 3, 4 ].every(isEven)
false
```

- If the array is empty, the result is true (and callback is not called):
```
[].every(function () { throw new Error() })
true
```

- `Array.prototype.some(callback, thisValue?)`
    - Returns true if the callback returns true for at least one element.
    - It stops iteration as soon as the callback returns true.
```
function isEven(x) { return x % 2 === 0 }
[ 1, 3, 5 ].some(isEven)
false

[ 1, 2, 3 ].some(isEven)
true
```

- one problem with `forEach` is that is dont support `break`
```
function breakAtEmptyString(strArr) {
    strArr.some(function (elem) {
        if (elem.length === 0) {
            return true; // break
        }
        console.log(elem);
        // implicit: return undefined (interpreted as false)
    });
}
```




### Transformation Methods
- signature `arr.examinationMethod(callback, thisValue?)`
- these method have a unique signature with first param as `callback` and second param as `value`
- the `callback` takes 3 param `function callback(element, index, array)`

- `Array.prototype.map(callback, thisValue?)`
    - return each elements, to create new array
```
[ 1, 2, 3 ].map(function (x) { return 2 * x })
[ 2, 4, 6 ]
```

- `Array.prototype.filter(callback, thisValue?)`
    - only return those elements in which the callback returns true
```
[ 1, 0, 3, 0 ].filter(function (x) { return x !== 0 })
[ 1, 3 ]
```



### Reduction Methods
- signature `arr.examinationMethod(callback, thisValue?)`
- these method `callback` function have different signature
- `previousValue` is the value returned by the `callback` method
- `currentElement` is the current value
- `currentIndex` is the index of the current value
- if `thisValue` is not provided then the array will start from second element, taking first element as previous
- if `thisValue` is given then `thisValue` is the first value
```
function callback(previousValue, currentElement, currentIndex, array)
```

- `Array.prototype.reduce(callback, initialValue?)`
    - moves from left to right
    - return the last value returned by the callback
```
function add(prev, cur) {
    return prev + cur;
}
console.log([10, 3, -1].reduce(add)); // 12
```

- single element array will return the last value
```
[7].reduce(add)
7
```

- empty array should have `initialValue` otherwise it will get error
```
[].reduce(add)
TypeError: Reduce of empty array with no initial value
[].reduce(add, 123)
123
```

- `Array.prototype.reduceRight(callback, initialValue?)`
    - Works the same as reduce(), but iterates from right to left.



### Examples
```
function printArgs(prev, cur, i) {
    console.log('prev:'+prev+', cur:'+cur+', i:'+i);
    return prev + cur;
}


['a', 'b', 'c'].reduce(printArgs)
prev:a, cur:b, i:1
prev:ab, cur:c, i:2
'abc'

['a', 'b', 'c'].reduce(printArgs, 'x')
prev:x, cur:a, i:0
prev:xa, cur:b, i:1
prev:xab, cur:c, i:2
'xabc'


['a', 'b', 'c'].reduceRight(printArgs)
prev:c, cur:b, i:1
prev:cb, cur:a, i:0
'cba'

['a', 'b', 'c'].reduceRight(printArgs, 'x')
prev:x, cur:c, i:2
prev:xc, cur:b, i:1
prev:xcb, cur:a, i:0
'xcba'
```



## Best Practices: Iterating over Arrays
- use `for` loop
- use `forEach`
- **Note: do not use `for-in` use as it iterates over index, and also include inherited ones**
```
var i = [1,2]
i.foo = "bar"
"bar"

for(var x in i){
    console.log(i[x])
}
1
2
bar
```
