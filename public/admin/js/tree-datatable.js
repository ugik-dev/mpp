// $.mockjax({
//     url: "hierarchy.json",
//     responseTime: 30,
//     responseText: {
//         data: [
//             {
//                 DT_RowId: "1",
//                 level: 0,
//                 key: "1",
//                 parent: 0,
//                 name: "Adam",
//                 value: 154,
//             },
//             {
//                 DT_RowId: "2",
//                 level: 1,
//                 key: "2",
//                 parent: 1,
//                 name: "Nelenil Adam",
//                 value: 55,
//             },
//             {
//                 DT_RowId: "3",
//                 level: 0,
//                 key: "3",
//                 parent: 0,
//                 name: "Ivan",
//                 value: 112,
//             },
//             {
//                 DT_RowId: "4",
//                 level: 1,
//                 key: "4",
//                 parent: 1,
//                 name: "Skakal Adam",
//                 value: 99,
//             },
//             {
//                 DT_RowId: "5",
//                 level: 1,
//                 key: "5",
//                 parent: 3,
//                 name: "Nelenil Ivan",
//                 value: 112,
//             },
//             {
//                 DT_RowId: "6",
//                 level: 0,
//                 key: "6",
//                 parent: 0,
//                 name: "Karol",
//                 value: 154,
//             },
//             {
//                 DT_RowId: "7",
//                 level: 1,
//                 key: "7",
//                 parent: 6,
//                 name: "Hufnagel Karol",
//                 value: 80,
//             },
//             {
//                 DT_RowId: "8",
//                 level: 1,
//                 key: "8",
//                 parent: 6,
//                 name: "Sipeky Karol",
//                 value: 74,
//             },
//             {
//                 DT_RowId: "9",
//                 level: 2,
//                 key: "9",
//                 parent: 4,
//                 name: "Skakal *st* Adam",
//                 value: 40,
//             },
//             {
//                 DT_RowId: "10",
//                 level: 2,
//                 key: "10",
//                 parent: 4,
//                 name: "Skakal *ml* Adam",
//                 value: 59,
//             },
//         ],
//     },
// });

function compareObjectDesc(a, b) {
    if (a.key !== b.key) {
        return a.value < b.value ? 1 : a.value > b.value ? -1 : 0;
    } else if (
        typeof a.child === "undefined" &&
        typeof b.child === "undefined"
    ) {
        return a.value < b.value ? 1 : a.value > b.value ? -1 : 0;
    } else if (
        typeof a.child !== "undefined" &&
        typeof b.child !== "undefined"
    ) {
        return compareObjectDesc(a.child, b.child);
    } else {
        return typeof a.child !== "undefined" ? 1 : -1;
    }
}

function compareObjectAsc(a, b) {
    if (a.key !== b.key) {
        return a.value < b.value ? -1 : a.value > b.value ? 1 : 0;
    } else if (
        typeof a.child === "undefined" &&
        typeof b.child === "undefined"
    ) {
        return a.value < b.value ? -1 : a.value > b.value ? 1 : 0;
    } else if (
        typeof a.child !== "undefined" &&
        typeof b.child !== "undefined"
    ) {
        return compareObjectAsc(a.child, b.child);
    } else {
        return typeof a.child !== "undefined" ? 1 : -1;
    }
}

jQuery.fn.dataTableExt.oSort["custom-asc"] = function (a, b) {
    return compareObjectAsc(a, b);
};

jQuery.fn.dataTableExt.oSort["custom-desc"] = function (a, b) {
    return compareObjectDesc(a, b);
};

function buildOrderObject(dt, key, column) {
    var rowData = dt.row("#" + key).data();
    if (typeof rowData === "undefined") {
        return {};
    } else {
        var object = buildOrderObject(dt, rowData["parent"], column);
        var a = object;
        while (typeof a.child !== "undefined") {
            a = a.child;
        }
        a.child = {};
        a.child.key = rowData["key"];
        a.child.value = rowData[column];
        return object;
    }
}
