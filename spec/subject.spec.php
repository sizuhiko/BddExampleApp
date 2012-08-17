<?php
describe "Subject"
  subject
    return 1;
  end
  it "subject == 1"
    should equal 1
  end

  context "nested context can access to subject"
    it "subject == 1"
      should equal 1
    end
  end

  context "nested subject"
    subject
      return 2;
    end
    it "subject == 2"
      should equal 2
    end
  end

  context "after nested context can access to this block subject"
    it "subject == 1"
      should equal 1
    end
  end

  context "it can be empty, it apply 'subject' for default title"
    it
      should equal 1
    end
  end

  context "use $this"
    it "subject == 1"
      $this->subject($W) should equal 1
    end
  end

  context "use its"
    subject
      $test = new \stdClass();
      $test->expect = 10;
      return $test;
    end
    its "expect"
      should equal 10
    end
    it "expect == 10"
      $this->subject($W)->expect should equal 10
    end
  end
end
