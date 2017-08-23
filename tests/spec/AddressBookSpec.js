// one suite
describe('Address book', function () {

    var ab, c;

    // this method will run before each spec
    beforeEach(function () {
        ab = new AddressBook();
        c = new Contact();
    });

    // Spec one
    it('should able to add contact', function () {

        // add new contact
        ab.addContact(c);

        // get first and test it
        expect(ab.getContact(0)).toBe(c);
    });

    // Spec two
    it('should be able to delete a contact', function () {

        ab.addContact(c);
        ab.deleteContact(0);

        expect(ab.getContact(0)).not.toBeDefined();
    })


});

// Suite two
describe('Async book call', function () {
    var ab, c;

    beforeEach(function (done) {
        ab = new AddressBook();
        c = new Contact();

        // this will stop the run async and then done()
        // once this is called then next function can run
        ab.getInitialContacts(function () {
            done()
        });
    });

    // Spec one
    // it('should grab initial contacts', function () {
    //     // Async method so weill pass it to run after it is working
    //     ab.getInitialContacts(function () {
    //         expect(ab.initialComplete).toBe(true);
    //     });
    // });

    // but passing above function will run expect method in
    // application environment, but in test environment
    it('should grab initial contacts', function (done) {
        expect(ab.initialComplete).toBe(true);
        done();
    });
});