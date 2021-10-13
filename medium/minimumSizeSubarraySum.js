/*
209. Minimum Size Subarray Sum - https://leetcode.com/problems/minimum-size-subarray-sum/

Given an array of positive integers nums and a positive integer target, return the minimal length of a contiguous subarray [numsl, numsl+1, ..., numsr-1, numsr] of which the sum is greater than or equal to target. If there is no such subarray, return 0 instead.

 

Example 1:
Input: target = 7, nums = [2,3,1,2,4,3]
Output: 2
Explanation: The subarray [4,3] has the minimal length under the problem constraint.

Example 2:
Input: target = 4, nums = [1,4,4]
Output: 1

Example 3:
Input: target = 11, nums = [1,1,1,1,1,1,1,1]
Output: 0

Follow up: If you have figured out the O(n) solution, try coding another solution of which the time complexity is O(n log(n)).
*/

let minSubArrayLen = function (target, nums) {
    let min = head = tail = currMin = currSum = 0;
    for (let i = 0; i < nums.length; i++) {
        currSum += nums[tail];
        currMin++;
        if (currSum >= target) {
            while (currSum >= target) {
                currSum -= nums[head];
                head++;
                if (min == 0 || currMin < min)
                    min = currMin;
                currMin--;
            }
        }
        tail++;
    }
    return min;
}

let target = 15;
let nums = [5,1,3,5,10,7,4,9,2,8];
target = 4;
nums = [1,4,4];
target = 11;
nums = [1,1,1,1,1,1,1,1];
target = 11;
nums = [1, 2, 3, 4, 5];
target = 4;
nums = [1, 4, 3];

let answer = minSubArrayLen(target, nums);
console.log(answer);
console.log("Expected: 3\n");
