// SPDX-License-Identifier: UNLICENSED
pragma solidity ^0.8.0;

contract Setup {
    bool private solved;
    string private constant WINNING_PHRASE = "welcome_to_0xGame2025";

    constructor() payable {
    }

    function solve(string memory phrase) public {
        if (keccak256(abi.encodePacked(phrase)) == keccak256(abi.encodePacked(WINNING_PHRASE))) {
            solved = true;
        } else {
            revert("Setup: Incorrect phrase.");
        }
    }

    function isSolved() external view returns (bool) {
        return solved;
    }

    receive() external payable {}
}