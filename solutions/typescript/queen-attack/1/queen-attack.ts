type Position = readonly [number, number];

type Positions = {
  white: Position;
  black: Position;
};

export class QueenAttack {
  public readonly white: Position;
  public readonly black: Position;

  constructor({ white, black }: Partial<Positions> = {}) {
    // Default positions
    const defaultWhite: Position = [7, 3]; // row 7, column 3 (d1)
    const defaultBlack: Position = [0, 3]; // row 0, column 3 (d8)

    this.white = white ?? defaultWhite;
    this.black = black ?? defaultBlack;

    // Validate positions
    [this.white, this.black].forEach((pos, index) => {
      const [row, col] = pos;
      if (row < 0 || row > 7 || col < 0 || col > 7) {
        throw new Error('Queen must be placed on the board');
      }
    });

    // Queens cannot share the same square
    if (this.white[0] === this.black[0] && this.white[1] === this.black[1]) {
      throw new Error('Queens cannot share the same space');
    }
  }

  get canAttack(): boolean {
    const [wr, wc] = this.white;
    const [br, bc] = this.black;

    // Same row or column
    if (wr === br || wc === bc) return true;

    // Diagonal check
    if (Math.abs(wr - br) === Math.abs(wc - bc)) return true;

    return false;
  }

  toString(): string {
    const board: string[][] = Array.from({ length: 8 }, () =>
      Array(8).fill('_')
    );

    board[this.white[0]][this.white[1]] = 'W';
    board[this.black[0]][this.black[1]] = 'B';

    return board.map(row => row.join(' ')).join('\n');
  }
}