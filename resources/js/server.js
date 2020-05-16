import context from './entry-server';

renderVueComponentToString(context, (err, res) => {
    print(res)
})