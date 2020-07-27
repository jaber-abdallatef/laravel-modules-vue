export class BlogModel {
    fields = [
        { name: "title", tag: "text" },
        { name: "body", tag: "textarea" },
        {
            name: "status",
            tag: "select",
            options: [{
                    value: '1',
                    text: 'Active'
                },
                {
                    value: '0',
                    text: 'InActive'
                }
            ]
        },
        { name: "title", tag: "text" },
    ]
    construct(data) {
        this.data = data
    }

    attributes() {
        return this.fields;
    }

}