$(-document).ready(function () {
    $('.container').hide();
    $('.container').fadeIn(1000);
    $("#arrayList").append(localStorage.getItem("myArray"));
    const arr = localStorage.getItem("myArray").split(" ");
    // console.log(arr);

    function handleSearchClick() {
        var inputVal = $("#ele").val();
        if (arr.indexOf(inputVal) !== -1) {
            alert(inputVal + " is present in the array");
        } else {
            alert(inputVal + " is not present in the array");
        }
    }

    function handleNextClick() {
        var arr = document.getElementById("array").value;
        localStorage.setItem("myArray", arr);
        window.location.href = "SecondPage.html";
    }

    function handleSortClick() {
        // Inbuilt Function
        let ar = localStorage.getItem("myArray").split(" ");
        let arBubble = ar.slice();
        let arMerge = ar.slice();
        localStorage.setItem("sortedFun", ar.slice().sort().join(" "));

        // Bubble sort
        arBubble = bubbleSort(arBubble);
        localStorage.setItem("sortedBubble", arBubble.join(" "));

        // Merge Sort
        arMerge = merge_sort(arMerge);
        localStorage.setItem("sortedMerge", arMerge.join(" "));
    }

    function bubbleSort(arr) {
        arr = arr.slice();
        for (var i = 0; i < arr.length; i++) {
            for (var j = 0; j < arr.length - i - 1; j++) {
                if (arr[j] > arr[j + 1]) {
                    var temp = arr[j];
                    arr[j] = arr[j + 1];
                    arr[j + 1] = temp;
                }
            }
        }
        return arr;
    }

    function merge_sort(arr) {
        if (arr.length < 2) {
            return arr;
        }
        const middle_index = Math.floor(arr.length / 2);
        const left_sub_array = arr.slice(0, middle_index);
        const right_sub_array = arr.slice(middle_index);
        return merge_Arrays(merge_sort(left_sub_array), merge_sort(right_sub_array));
    }
    function merge_Arrays(left_sub_array, right_sub_array) {
        let array = []
        while (left_sub_array.length && right_sub_array.length) {
            if (left_sub_array[0] < right_sub_array[0]) {
                array.push(left_sub_array.shift())
            } else {
                array.push(right_sub_array.shift())
            }
        }
        return [...array, ...left_sub_array, ...right_sub_array]
    }

    $("#fun").append(localStorage.getItem("sortedFun") + " ");
    $("#bubble").append(localStorage.getItem("sortedBubble") + " ");
    $("#merge").append(localStorage.getItem("sortedMerge") + " ");

    $("#nextBtn").click(handleNextClick);
    $("#searchBtn").click(handleSearchClick);
    $("#sortBtn").click(handleSortClick);
});