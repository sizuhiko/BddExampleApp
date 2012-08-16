<?php
class Bowling
{
    public $score = 0;

    public function hit($pins)
    {
    }
}

describe "Bowling"
  describe "#score"
    it "returns 0 for all gutter game"
      $bowling = new Bowling;
      for ($i = 1; $i <= 20; $i++) {
        $bowling->hit(0);
      }
      $bowling->score should equal 0
    end
  end
end

describe "Bowling#score"
  it "returns 0 for all gutter game"
    $bowling = new Bowling;
    array_filter(range(0, 19), function() use($bowling){ $bowling->hit(0); } );
    $bowling->score should equal 0
  end
end

describe "Bowling#score use subject and it"
  context "all gutter game"
    before
      $W->bowling = new Bowling;
      array_filter(range(0, 19), function() use($W) { $W->bowling->hit(0); } );
    end
    subject
      return $W->bowling->score;
    end
    it
      should equal 0
    end
  end
end

describe "Bowling#score use subject and its"
  context "all gutter game"
    subject
      $bowling = new Bowling;
      array_filter(range(0, 19), function() use($bowling) { $bowling->hit(0); } );
      return $bowling;
    end
    its "score"
      should equal 0
    end
  end
end
