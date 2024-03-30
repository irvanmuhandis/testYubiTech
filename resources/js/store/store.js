// store/modules/myModule.js
export const myModule = {
    state: {
        style: [
            {
                id: 0,
                style_name: "",
                total: 0,
                selectedMethod: [
                    {
                        id: 0,
                        name: "",
                        subQty: 0,
                        selectedColor: [
                            {
                                name: "",
                                id: 0,
                                qty: 0,
                            },
                        ],
                    },
                ],
            },
        ],
    },
    mutations: {
        // Mutation to update subQty of selectedMethod
        updateSubQty(state, { styleIndex, methodIndex }) {
            const method = state.style[styleIndex].selectedMethod[methodIndex];
            const subQty = method.selectedColor.reduce(
                (acc, color) => acc + color.qty,
                0
            );
            state.style[styleIndex].selectedMethod[methodIndex].subQty = subQty;
        },
        // Mutation to update total based on subQty of selectedMethod
        updateTotal(state, styleIndex) {
            const styled = state.style[styleIndex];
            const total = styled.selectedMethod.reduce(
                (acc, method) => acc + method.subQty,
                0
            );
            state.style[styleIndex].total = total;
        },
        setStyle(state, { data }) {
            state.style = data;
        },
        // Mutation to delete a selectedMethod from a style
        setSelectedMethod(state, { styleIndex, data }) {
            console.log("====================================");
            console.log(styleIndex);
            console.log(state.style[styleIndex].selectedMethod);
            console.log("====================================");
            state.style[styleIndex].selectedMethod = data;
        },
        // Mutation to delete a selectedColor from a selectedMethod
        setSelectedColor(state, { styleIndex, methodIndex, data }) {
            console.log("===========slctd clr======================");
            console.log(styleIndex);
            console.log(methodIndex);
            console.log(state.style[styleIndex].selectedMethod[methodIndex]);
            console.log("====================================");
            state.style[styleIndex].selectedMethod[methodIndex].selectedColor =
                data;

            const subQty =  state.style[styleIndex].selectedMethod[methodIndex].selectedColor.reduce(
                (acc, color) => acc + color.qty,
                0
            );
            state.style[styleIndex].selectedMethod[methodIndex].subQty = subQty;

            const total =  state.style[styleIndex].selectedMethod.reduce(
                (acc, method) => acc + method.subQty,
                0
            );
            state.style[styleIndex].total = total;
        },
    },
    getters: {
        // Getter to compute total for a specific style
        getStyle: (state) => {
            return state.style;
        },
        // Getter to compute subQty for a specific selectedMethod within a style
        getQty: (state) => (styleIndex, methodIndex,colorIndex) => {
            return state.style[styleIndex].selectedMethod[methodIndex].selectedColor[colorIndex].qty;
        },
        // Getter to check if a style exists in the state
        isStyleExists: (state) => (styleIndex) => {
            return styleIndex >= 0 && styleIndex < state.style.length;
        },
        // Getter to check if a selectedMethod exists in a style
        isMethodExists: (state) => (styleIndex, methodIndex) => {
            return (
                styleIndex >= 0 &&
                styleIndex < state.style.length &&
                methodIndex >= 0 &&
                methodIndex < state.style[styleIndex].selectedMethod.length
            );
        },
        // Getter to check if a selectedColor exists in a selectedMethod
        isColorExists: (state) => (styleIndex, methodIndex, colorIndex) => {
            return (
                styleIndex >= 0 &&
                styleIndex < state.style.length &&
                methodIndex >= 0 &&
                methodIndex < state.style[styleIndex].selectedMethod.length &&
                colorIndex >= 0 &&
                colorIndex <
                    state.style[styleIndex].selectedMethod[methodIndex]
                        .selectedColor.length
            );
        },
    },
    // Other Vuex module options (actions, etc.) can be defined here
};
