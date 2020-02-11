let comments = [
    {
        email: "a",
        time: "a-time",
        content: "a-text",
        replies: [
            {
                email: "aa",
                time: "aa-time",
                content: "aa-text",
                replies: [
                    {
                        email: "aaa",
                        time: "aaa-time",
                        content: "aaa-text",
                        replies: [
                            {
                                email: "aaaa",
                                time: "aaaa-time",
                                content: "aaaa-text",
                                replies: []
                            }
                        ]
                    },
                    {
                        email: "aab",
                        time: "aab-time",
                        content: "aab-text",
                        replies: [
                            {
                                email: "aaba",
                                time: "aaba-time",
                                content: "aaba-text",
                                replies: []
                            }
                        ]
                    }
                ]
            }
        ]
    },
    {
        email: "b",
        time: "b-time",
        content: "b-text",
        replies: [
            {
                email: "ba",
                time: "ba-time",
                content: "ba-text",
                replies: []
            },
            {
                email: "bb",
                time: "bb-time",
                content: "bb-text",
                replies: [
                    {
                        email: "bba",
                        time: "bba-time",
                        content: "bba-text",
                        replies: []
                    }
                ]
            }
        ]
    }
];
const padStart = (s, t, n) => {
    for (let i = 0; i < n; i++)
        s = t + s;
    return s;
}
const render = (parent, level) => {
    if (parent.content) {
        console.log(padStart(parent.content, '  ', level));
        // populate parent comment object
    }
    for (let child of parent) {
        if (child.content) {
            console.log(padStart(child.content, '  ', level));
            // populate child comment object
        }
        render(child.replies, level+1);
    }
}
render(comments, 0);
