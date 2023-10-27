const { Selector } = require("testcafe");

fixture`Prueba de conversión`.page("http://185.253.152.29:8000/");


test('Prueba de conversión', async (t) =>{
    const select1 = Selector('#select1');
    const select2 = Selector('#select2');
    const inputValue = Selector('#inputValue');
    const convertButton = Selector('#convertButton');
    const result = Selector('#result');

    await t
        .click(select1)
        .click(Selector('option').withText('Kilómetros'))
        .typeText(inputValue, '1')
        .click(select2)
        .click(Selector('option').withText('Metros'))
        .click(convertButton);
    await t.expect(result.value).eql('1000');
});