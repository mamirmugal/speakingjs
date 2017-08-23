# Udacity Javascript Testing

## Lesson 2

### Intro to Jasmine
- [git clone https://github.com/udacity/ud549]

- spec is `it()`
    -  it has multiple statements and if they all are true only then they the spec will pass
    -  

- Suite is `describe()`
    - a group of related spec

### Writing a Test
- has an `expect()` method to get result and match it with following chain method `expect(add(1,2)).toBe(3);`

### Testing Async Code
- when dealing with async code jasmine work in sync way, like promise
- so well pass `done` function and when the operation is completed we will call `done()` to signal jasmine to move on to another method
- `done()` will work on both `beforeEach` and `it` spec methods
- the test will take time to run all async and then show test results