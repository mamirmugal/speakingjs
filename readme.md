# Udacity Promise

[https://davidwalsh.name/promises]
[https://medium.com/javascript-scene/master-the-javascript-interview-what-is-a-promise-27fc71e77261]
[https://developers.google.com/web/fundamentals/getting-started/primers/promises]

## Stages
- Fulfilled (resolved)
- Rejected
- Pending
- Settled

## Notes
- it can be only settled one, so `resolve` can only be called once
- if `resolve` and `reject` pass nothing, then `undefined` is passed
- if `resolve` passes promise then it will be resolved first
    - then when it `resolve` is passed will be passed next
- `resolve` leads to next `then` in the chain
- `reject` leads to next `catch` in the chain
- if there is an error in the body of the promise `.catch` will be called
- applying changes to element and their properties are sync not async
- `img.onload` this event handler is called when the img has finished loading.
```
new Promise(function(resolve, reject){
var img  = document.createElement('img');
img.src = 'image.jpg'
img.onload = resolve;
img.onerror = reject;
document.body.appendChild(img);
})
.then(function(){
    // finish loading
})
.catch(function(){
    // catch error
});
```

**Note** 
- when `resolved` is called it will return from that statement it will keep on execution tell the end of the function
- so in below example `first`, `second` and `third` will be called
```
new Promise(function(resolve) {
  console.log('first');
  resolve();
  console.log('second');
}).then(function() {
  console.log('third');
});
first
second
third
```


## Quiz
- `this` inside promise will point to `window` object, but is ES6 arrow function it will point to different object


## Quiz
- `document.addEventListener('readystatechange', function)` will be fired when ever the readyState changes
- once we have required readyState then we can fire our `promise`


## folder exoplanet-explorer
- npm install -g gulp bower && npm install && bower install


## Fetch Api [https://davidwalsh.name/fetch]
- they are alternative to xhr
- they are common support with all popular browsers


## .then pitfall
- `.then(resolve, reject)`
- in above code if previous promise gets rejected then this `reject` is called 
- but if there is an error in this `.then resolve` then we need another `.catch` after this to catch its error
- the best way to workaround this problem is
```
get().then(resolve).catch(resolve);
```

**Note**
- Both are same
- calling `reject` will go to `.catch` method
- calling `resolve(Promise.reject())` will go to `.catch` method, because the value passed is `reject`
```
new Promise(function (resolve, reject) {
    reject()
}).then(function () {
    console.log("here")
}).catch(function () {
    console.log("error")
});

new Promise(function (resolve, reject) {
    resolve(Promise.reject())
}).then(function () {
    console.log("here")
}).catch(function () {
    console.log("error")
});
```

- Both are same
- calling `resolve` will go to `.then` method
- calling `reject(Promise.resolve())` will go to `.then` method, because the value passed is `resolve`
```
new Promise(function (resolve, reject) {
    resolve()
}).then(function () {
    console.log("here")
}).catch(function () {
    console.log("error")
});

new Promise(function (resolve, reject) {
    reject(Promise.resolve())
}).then(function () {
    console.log("here")
}).catch(function () {
    console.log("error")
});
```

### forEach
- [https://developers.google.com/web/fundamentals/getting-started/primers/promises]
- we can use `sequence`
- which should be `sequence = sequence.then`, without assigning to sequence it will become parallel 