<script type="text/javascript" src="function.js"></script>
<script type="text/javascript">

    //<<<<<<< HEAD
    // www folder change
    //=======
    // new changes

    // >>>>>>> 9bdab274a28b18b27706d08c8b38daf03e849c3f
    switch(getUri()){
    
        case '1':
            console.log( '"cake".length * 9 :: ' + "cake".length * 9);
            break;
        
        case '2':
            console.log( '"wonderful day".substring(3,7) :: ' + "wonderful day".substring(3,7));
            break;
        
        case '3':
            
            console.log('var divideByThree = function (number) { \n'+
                'var val = number / 3;\n'+
                'console.log(val);\n'+
                '};\n'+
                'divideByThree(6);\n');
            var divideByThree = function (number) {
                var val = number / 3;
                console.log(val);
            };
            divideByThree(6);
            
            break;
            
        case '4':
            
            console.log('var timesTwo = function(number) {\n'+
                'return number * 2;\n'+
                '};\n'+
                ' \n'+
                '// call timesTwo here\n'+
                'var newNumber = timesTwo(10);\n'+
                'console.log(newNumber);\n');
            
            var timesTwo = function(number) {
                return number * 2;
            };

            // call timesTwo here
            var newNumber = timesTwo(10);
            console.log(newNumber);

            break;
        
        case '5':
            
            console.log('var multiplied;\n'+
                'var timesTwo = function(number) {\n'+
                'multiplied = number * 2;\n'+
                '};\n'+
                '\n'+
                'timesTwo(4);\n'+
                'console.log(multiplied);\n');
            
            var multiplied;
            var timesTwo = function(number) {
                multiplied = number * 2;
            };

            timesTwo(4);
            console.log(multiplied);
            
            break;
        
        case '6':
            
            console.log('var junkData = ["Eddie Murphy", 49, "peanuts", 31];\n'+
                '\n'+
                'console.log(junkData[3])\n');
            
            var junkData = ["Eddie Murphy", 49, "peanuts", 31];
            console.log(junkData[3])
            
            break;
     
        case '7':
            
            console.log('var cities = ["Melbourne", "Amman", "Helsinki", "NYC","Melbourne", "Amman", "Helsinki", "NYC"];\n'+
                '\n'+
                'for (var i = 0; i < cities.length; i++) {\n'+
                'console.log("I would like to visit" + " " + cities[i]);\n'+
                '}\n');
            
            var cities = ["Melbourne", "Amman", "Helsinki", "NYC","Melbourne", "Amman", "Helsinki", "NYC"];

            for (var i = 0; i < cities.length; i++) {
                console.log("I would like to visit" + " " + cities[i]);
            }
            
            break;
            
        case '8':
            
            console.log('var coin = Math.floor(Math.random() * 2);\n'+
                '\n'+
                'while(coin){\n'+
                'console.log("Heads! Flipping again...");\n'+
                'var coin = Math.floor(Math.random() * 2);\n'+
                '}\n'+
                'console.log("Tails! Done flipping.");\n');
            
            var coin = Math.floor(Math.random() * 2);

            while(coin){
                console.log("Heads! Flipping again...");
                var coin = Math.floor(Math.random() * 2);
            }
            console.log("Tails! Done flipping.");
            
            
            
            console.log('console.log(isNaN("berry"));\n'+
                'console.log(isNaN(NaN));\n'+
                'console.log(isNaN(undefined));\n'+
                'console.log(isNaN(42));\n');
            
            console.log(isNaN("berry"));
            console.log(isNaN(NaN));
            console.log(isNaN(undefined));
            console.log(isNaN(42));
            
            break;

        case '9':
            
            console.log('var bob = new Object();\n'+
                'bob.name = "Bob Smith";\n'+
                'bob.age = 30;\n'+
                '// Here is susan1, in literal notation\n'+
                'var susan1 = {\n'+
                'name: "Susan Jordan",\n'+
                'age: 24\n'+
                '};\n');
            
            var bob = new Object();
            bob.name = "Bob Smith";
            bob.age = 30;
            // Here is susan1, in literal notation
            var susan1 = {
                name: "Susan Jordan",
                age: 24
            };
            
            break;

        case '10':
           
            console.log('var bob = new Object();\n'+
                'bob.age = 30;\n'+
                '// this time we have added a method, setAge\n'+
                'bob.setAge = function (newAge){\n'+
                '  bob.age = newAge;\n'+
                '};\n'+
                '\n'+
                'bob.getYearOfBirth = function () {\n'+
                '  return 2012 - bob.age;\n'+
                '};\n'+
                'console.log(bob.getYearOfBirth());\n');
           
            var bob = new Object();
            bob.age = 30;
            // this time we have added a method, setAge
            bob.setAge = function (newAge){
                bob.age = newAge;
            };

            bob.getYearOfBirth = function () {
                return 2012 - bob.age;
            };
            console.log(bob.getYearOfBirth()); F
           
            break;

        case '11':
            
            console.log('function Person(name,age) {\n'+
                'this.name = name;\n'+
                'this.age = age;\n'+
                '}\'n'+
                '\n'+
                '// Lets make bob and susan again, using our constructor\n'+
                'var bob = new Person("Bob Smith", 30);\n'+
                'var susan = new Person("Susan Jordan", 25);\n');
            
            function Person(name,age) {
                this.name = name;
                this.age = age;
            }

            // Let's make bob and susan again, using our constructor
            var bob = new Person("Bob Smith", 30);
            var susan = new Person("Susan Jordan", 25);
            
            break;


        case '12':
            
            console.log('var james = {\n'+
                'job: "programmer",\n'+
                'married: false\n'+
                '};\n'+
                '\n'+
                '// set to the first property name of "james"\n'+
                'var aProperty = "job";\n'+
                'console.log(james[aProperty])\n');
            
            var james = {
                job: "programmer",
                married: false
            };

            // set to the first property name of "james"
            var aProperty = 'job';

            console.log(james[aProperty])
            
            break;


        case '13':
            
            console.log('var myObj = {\n'+
                'name : "amir"\n'+
                '};\n'+
                'console.log( myObj.hasOwnProperty("name") ); // should print true\n'+
                'console.log( myObj.hasOwnProperty("nickname") ); // should print false\n');
            
            var myObj = {
                name : "amir"
            };
            console.log( myObj.hasOwnProperty('name') ); // should print true
            console.log( myObj.hasOwnProperty('nickname') ); // should print false
            
            break;



        case '14':
            
            console.log('function Dog (breed) {\n'+
                'this.breed = breed;\n'+
                '};\n'+
                '\n'+
                '// here we make buddy and teach him how to bark\n'+
                'var buddy = new Dog("golden Retriever");\n'+
                'Dog.prototype.bark = function() {\n'+
                '  console.log("Woof");\n'+
                '};\n'+
                'buddy.bark();\n'+
                '\n'+
                '// here we make snoopy\n'+
                'var snoopy = new Dog("Beagle");\n'+
                '/// this time it works!\n'+
                'snoopy.bark();\n');
            
            function Dog (breed) {
                this.breed = breed;
            };

            // here we make buddy and teach him how to bark
            var buddy = new Dog("golden Retriever");
            Dog.prototype.bark = function() {
                console.log("Woof");
            };
            buddy.bark();

            // here we make snoopy
            var snoopy = new Dog("Beagle");
            /// this time it works!
            snoopy.bark();
            
            break;



        case '15':
            
            console.log('// original classes\n'+
                'function Animal(name, numLegs) {\n'+
                '    this.name = name;\n'+
                '    this.numLegs = numLegs;\n'+
                '    this.isAlive = true;\n'+
                '}\n'+
                'function Penguin(name) {\n'+
                '    this.name = name;\n'+
                '    this.numLegs = 2;\n'+
                '}\n'+
                'function Emperor(name) {\n'+
                '    this.name = name;\n'+
                '    this.saying = "Waddle waddle";\n'+
                '}\n'+
                '\n'+
                '// set up the prototype chain\n'+
                'Penguin.prototype = new Animal();\n'+
                'Emperor.prototype = new Penguin();\n'+
                '\n'+
                'var myEmperor = new Emperor("Jules");\n'+
                '\n'+
                'console.log( myEmperor.saying ); // should print "Waddle waddle"\n'+
                'console.log( myEmperor.numLegs  ); // should print 2\n'+
                'console.log( myEmperor.isAlive ); // should print true\n');
            
            // original classes
            function Animal(name, numLegs) {
                this.name = name;
                this.numLegs = numLegs;
                this.isAlive = true;
            }
            function Penguin(name) {
                this.name = name;
                this.numLegs = 2;
            }
            function Emperor(name) {
                this.name = name;
                this.saying = "Waddle waddle";
            }

            // set up the prototype chain
            Penguin.prototype = new Animal();
            Penguin.prototype.constructor = Penguin;
            Emperor.prototype = new Penguin();

            var myEmperor = new Emperor("Jules");

            console.log( myEmperor.saying ); // should print "Waddle waddle"
            console.log( myEmperor.numLegs  ); // should print 2
            console.log( myEmperor.isAlive ); // should print true
            
            break;



        case '16':
            
            console.log('function Person(first,last,age) {\n'+
                '   this.firstname = first;\n'+
                '   this.lastname = last;\n'+
                '   this.age = age;\n'+
                '   this.myBalance = null\n'+
                '   var bankBalance = 7500;\n'+
                '  \n'+
                '   this.getBalance = function() {\n'+
                '      // your code should return the bankBalance\n'+
                '      return bankBalance;\n'+
                '   };\n'+
                '}\n'+
                '\n'+
                'var john = new Person("John","Smith",30);\n'+
                'console.log(john.getBalance());\n');
            
            function Person(first,last,age) {
                this.firstname = first;
                this.lastname = last;
                this.age = age;
                this.myBalance = null
                var bankBalance = 7500;
  
                this.getBalance = function() {
                    // your code should return the bankBalance
                    return bankBalance;
                };
            }

            var john = new Person('John','Smith',30);
            console.log(john.getBalance());
            
            break;



        case '17':
            
            console.log('function StudentReport() {\n'+
                '    this.grade1 = 4;\n'+
                '    this.grade2 = 2;\n'+
                '    this.grade3 = 1;\n'+
                '    this.getGPA = function() {\n'+
                '        return (this.grade1 + this.grade2 + this.grade3) / 3;\n'+
                '    };\n'+
                '}\n'+
                '\n'+
                'var myStudentReport = new StudentReport();\n'+
                '\n'+
                'for(var x in myStudentReport) {\n'+
                '    if(typeof myStudentReport[x] !== "function") {\n'+
                '        console.log("Muahaha! "+myStudentReport[x]);\n'+
                '    }\n'+
                '}\n'+
                '\n'+
                'console.log("Your overall GPA is "+myStudentReport.getGPA());\n');
            
            function StudentReport() {
                this.grade1 = 4;
                this.grade2 = 2;
                this.grade3 = 1;
                this.getGPA = function() {
                    return (this.grade1 + this.grade2 + this.grade3) / 3;
                };
            }

            var myStudentReport = new StudentReport();

            for(var x in myStudentReport) {
                if(typeof myStudentReport[x] !== "function") {
                    console.log("Muahaha! "+myStudentReport[x]);
                }
            }

            console.log("Your overall GPA is "+myStudentReport.getGPA());
            
            break;
        
        case '18':
            
            console.log('matches = ["12", "watt"];\n'+
                        '[value, unit] = matches; \n');

            var matches = ['12', 'watt'];
            [value, unit] = matches; 
            console.log(value + " " + unit);
            break;    
    }
  

</script>
<script type="text/javascript">

    function object(){
        var students = {};

        students.name = "Amir";
        students.age = 20;
        students.checkage = function(){
            console.log(" Then name is " + this.name + " and age is " + this.age);
        }

        students.checkage();
    }

</script>

